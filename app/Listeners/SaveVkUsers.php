<?php

namespace App\Listeners;

use App\Events\GetVkUsers;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\VkData;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class SaveVkUsers
{
    /**
     * Обработка события GetVkUsers, загрузка файла картинки, 
     * получение id последней записи в таблице media для формирования локального url картинки,
     * сохранение записей в БД через модель VkData, в поле email сохраняется пустое значение,
     * данные о картинке пользователя также сохраняются в таблицу media, так как применяется библиотека laravel media library.
     * 
     * @param  \App\Events\GetVkUsers  $event
     * @return void
     */
    public function handle(GetVkUsers $getVkUsers)
    { 
        foreach ($getVkUsers->vk_service as $vkRecord) {
            $url = $vkRecord['photo_200_orig'];
            $info = pathinfo($url);
            $info['basename'] = preg_replace("/\?.+/", "", $info['basename']);
            $contents = file_get_contents($url);
            $file = '/tmp/' . $info['basename'];
            file_put_contents($file, $contents);
            $uploaded_file = new UploadedFile($file, $info['basename']);
            $id_last = DB::table('media')->latest()->first('id');
            $id_last1 = $id_last->id+1;
            VkData::create([
                'first_name' => $vkRecord['first_name'],
                'last_name' => $vkRecord['last_name'],
                'email' => '',
                'photo' => url(config('filesystems.disks.media.url').'/'.$id_last1.'/'.$info['basename']),
                'bdate' => $vkRecord['bdate'] ?? '',
                'vk_id' => $vkRecord['id'],
                'mobile_phone' => $vkRecord['mobile_phone'] ?? '',
                'skype' => $vkRecord['skype'] ?? '',
            ])->addMedia($uploaded_file)->toMediaCollection('images');
        }
    }
}