<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class FileData extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		// Tao 10000 ban ghi bang file
		$fileArray = [];
		$timeNow = Carbon::now();
		for ($i = 10221; $i < 10251; $i++) {
			array_push($fileArray, [
				'filename' => 'fileame-' . $i . '.jpeg',
				'deadline' => $timeNow, // Lay thoi gian hien tai
				'status' => 1,
				'priority' => 1,
				'user_id' => 109,
				'synchronize' => 0,
				'created_at' => $timeNow,
				'updated_at' => $timeNow
			]);
		}
		// Debug trong Laravel,
		try {
			// Tao 1 yeu cau giao dich voi CSDL
			DB::beginTransaction();
			// Khi thao tac cua yeu cau thanh cong thi moi cap nhat du lieu
			DB::table('files')->insert($fileArray);
			// Tien hanh xu ly du lieu
			DB::commit();
		} catch (\Exception $e) {
			// Neu thao tac giao dich vs CSDL that bai
			// Tien hanh rollback ve du lieu cu
			DB::rollBack();
			dd($e);
		}
	}
}
