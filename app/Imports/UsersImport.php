<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Profile;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithStartRow;

class UsersImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        if ($row[0] === 'email' && $row[1] === 'email') {
            return null; // Skip the header row
        }

        // Cari pengguna berdasarkan alamat email
        $user = User::where('email', $row[0])->first();

        if (!$user) {
            // Buat pengguna baru jika tidak ada yang ditemukan
            $user = new User([
                'email' => $row[0],
                'name' => $row[1],
                'password' => bcrypt($row[2]),
                'phone' => $row[3],
            ]);

            // Simpan pengguna ke database
            $user->save();
        } else {
            // Perbarui data pengguna jika sudah ada
            $user->email = $row[0];
            $user->name = $row[1];
            $user->password = bcrypt($row[2]);
            $user->phone = strval($row[3]);
            $user->save();
        }

        // Buat profil yang terkait dengan pengguna
        $profile = Profile::updateOrCreate(
            ['user_id' => $user->id],
            [
                'address' => $row[4],
            ]);

        return $user; // Kembalikan model User jika perlu
    }

    public function startRow(): int
    {   
        return 2; // Mulai dari baris ke-2 (lewatkan baris header)
    }
}
