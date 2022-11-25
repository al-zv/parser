<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\VkService;

class VkParse extends Command
{
    /**
     * Объявление имени и параметра консольной команды.
     *
     * @var string
     */
    protected $signature = 'vk:parse {count_users}';

    /**
     * Описание консольной команды
     *
     * @var string
     */
    protected $description = 'Команда для начала парсинга с ВК';

    /**
     * Обработка консольной команды,
     * вызов сервиса для выполнения парсинга.
     *
     * @return App\VkService
     */
    public function handle()
    {
        $countUsers = $this->argument('count_users');
        (new VkService)->parsing($countUsers);
    }
}
