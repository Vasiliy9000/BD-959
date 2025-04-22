<?php

namespace Sprint\Migration;

use Bitrix\Iblock\ElementTable;
use CIBlockElement;
use CIBlockPropertyEnum;
use Exception;
use Throwable;

class BD959_20250214000002 extends Version
{
    protected $author = "v.andreev";

    protected $description = "Добавление тестовых данных в ИБ `Cargonomica - О компании - Настройки страницы`";

    protected $moduleVersion = "4.15.1";

    protected const string IBLOCK_TYPE_ID = 'CARGONOMICA_ABOUT';

    protected const string IBLOCK_CODE = 'CARGONOMICA_ABOUT_SETTINGS';

    /** @var array Тестовые данные для добавления в инфоблок */
    protected array $testData = [
        'NAME' => 'Настройка инфоблока',
        'CODE' => 'index',
        'ACTIVE' => 'Y',
        'PROPERTY_VALUES' => [
            'OPTIMIZATION_FOR_PROFIT_TITLE' => 'Оптимизация для роста прибыли',
            'OUR_APPROACH_TITLE' => 'Наш подход',
            'HISTORY_TITLE' => 'История',
            'PRODUCTS_ECOSYSTEM_TITLE' => 'Продукты экосистемы',
            'NEWS_COMPANY_TITLE' => 'Новости',
            'DOCUMENT_TITLE' => 'Документы',
        ],
    ];

    /**
     * @return bool Успешность выполнения операции.
     */
    public function up(): bool
    {
        try {
            $helper = $this->getHelperManager();
            $iblockId = $helper->Iblock()->getIblockId(
                self::IBLOCK_CODE,
                self::IBLOCK_TYPE_ID,
            );

            // Массив кодов свойств-чекбоксов
            $checkboxProperties = [
                'OPTIMIZATION_FOR_PROFIT_SHOW_BLOCK',
                'OUR_APPROACH_SHOW_BLOCK',
                'HISTORY_SHOW_BLOCK',
                'PRODUCTS_ECOSYSTEM_SHOW_BLOCK',
                'NEWS_COMPANY_SHOW_BLOCK',
                'DOCUMENT_SHOW_BLOCK',
            ];

            // Получаем ID значения "Y" для вышеперечисленных свойств
            $propertyEnumTableResult = CIBlockPropertyEnum::GetList(
                [], [
                    "IBLOCK_ID" => $iblockId,
                    "PROPERTY_CODE" => $checkboxProperties,
                    "VALUE" => "Y",
                ]
            );

            $propertyValueIds = [];

            while ($property = $propertyEnumTableResult->Fetch()) {
                $propertyValueIds[$property['PROPERTY_CODE']] = $property['ID'];
                $this->testData['PROPERTY_VALUES'][$property['PROPERTY_CODE']] = $property['ID']; // дополняем обьектик динамичными данными
            }

            $helper->Iblock()->addElementIfNotExists($iblockId, $this->testData);
            $this->outInfo("Добавлен тестовый элемент ИБ {$this->testData['CODE']}");

            $this->outSuccess("Добавление тестовых данных прошло успешно");

            return true;
        } catch (Throwable $e) {
            $this->outError("Не удалось добавить тестовые данные");
            $this->outException($e);

            return false;
        }
    }

    /**
     * @return bool Успешность выполнения операции.
     */
    public function down(): bool
    {
        try {
            $helper = $this->getHelperManager();

            $iblock = $helper->Iblock()->getIblock([
                'IBLOCK_TYPE_ID' => self::IBLOCK_TYPE_ID,
                'CODE' => self::IBLOCK_CODE,
            ]);

            if (!$iblock) {
                $this->outError("Инфоблок не найден.");
                return false;
            }

            $elementCodes = array_column($this->testData, 'CODE'); // testData

            $elements = ElementTable::getList([
                'filter' => [
                    'IBLOCK_ID' => $iblock['ID'],
                    'CODE' => $elementCodes,
                ],
                'select' => [
                    'ID',
                    'CODE',
                ],
            ])->fetchAll();

            $elementMap = array_column($elements, 'ID', 'CODE');

            foreach ($elementCodes as $elementCode) {
                if (!isset($elementMap[$elementCode])) {
                    throw new Exception("Элемент с CODE {$elementCode} не найден.");
                }

                if (CIBlockElement::Delete($elementMap[$elementCode])) {
                    $this->outInfo("Элемент с CODE {$elementCode} успешно удалён.");
                } else {
                    throw new Exception("Не удалось удалить элемент с CODE {$elementCode}.");
                }
            }

            $this->outSuccess("Откат тестовых данных в ИБ завершён.");
            return true;
        } catch (Exception $e) {
            $this->outError("Ошибка при откате миграции.");
            $this->outException($e);
            return false;
        }
    }
}
