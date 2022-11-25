<?php

namespace App;

use Illuminate\Support\Facades\Http;  
use App\Events\GetVkUsers;

class VkService
{

    /**
     * Парсинг пользователей с ВК, генерация массива с id пользователей,
     * вызов API метода users.get с необходимыми параметрами,
     * создание события GetVkUsers, если не пустой ответ от парсинга.
     *
     * @param int $countUsers
     * @return \App\Events\GetVkUsers
     */
    public function parsing($countUsers) {
        define("USER_ID", "207880");
        $countUsers = $countUsers - 1;
        foreach (range(USER_ID, USER_ID+$countUsers, 1) as $id) {
            $arr[] = $id;
        }
        $response = Http::get(config('services.vk.url').'users.get', [
            'user_ids' => $arr,
            'access_token' => config('services.vk.token'),
            'v' => config('services.vk.version'),
            'fields' => 'id,first_name,last_name,photo_200_orig,bdate,contacts,connections',
        ]);
        $vk_service = $response->json()['response'];
        if(!empty($vk_service)) {
            event(new GetVkUsers($vk_service));
        }
    }
}
