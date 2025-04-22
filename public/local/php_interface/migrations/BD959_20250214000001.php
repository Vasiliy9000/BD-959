<?php

namespace Sprint\Migration;

use Bitrix\Iblock\PropertyTable;
use Throwable;

/**
 * @see https://jira.cargonomica.com/browse/BD-959
 */
class BD959_20250214000001 extends Version
{
    protected const string IBLOCK_TYPE_ID = 'CARGONOMICA_ABOUT';

    protected $author = "v.andreev";

    protected $description = "Миграция на ИБ 'Cargonomica - О компании - Настройки страницы'";

    protected $moduleVersion = "4.15.1";

    /**
     * @var array
     */
    protected array $iblockTypeData = [
        'ID' => self::IBLOCK_TYPE_ID,
        'LANG' => [
            'ru' => [
                'NAME' => 'Cargonomica - О компании',
                'SECTION_NAME' => 'Разделы',
                'ELEMENT_NAME' => 'Элементы',
            ],
        ],
    ];

    /**
     * @var array
     */
    protected array $iblockData = [
        'IBLOCK_TYPE_ID' => self::IBLOCK_TYPE_ID,
        'NAME' => 'Cargonomica - О компании - Настройки страницы',
        'CODE' => 'CARGONOMICA_ABOUT_SETTINGS',
        'LID' => ['s1'],
    ];

    /**
     * @var array|array[]
     */
    protected array $iblockPropertiesData = [
        [
            'NAME' => 'Оптимизация для роста прибыли - выводить блок',
            'ACTIVE' => 'Y',
            'CODE' => 'OPTIMIZATION_FOR_PROFIT_SHOW_BLOCK',
            'PROPERTY_TYPE' => PropertyTable::LISTBOX,
            // тип - список
            'MULTIPLE' => 'N',
            'IS_REQUIRED' => 'N',
            'LIST_TYPE' => 'C',
            // тип списка - чекбоксы
            'VALUES' => [
                0 => [ // единственное значение
                       'VALUE' => 'Y',
                       'DEF' => 'Y',
                       'SORT' => '500',
                ],
            ],
        ],
        [
            'NAME' => 'Оптимизация для роста прибыли - заголовок',
            'ACTIVE' => 'Y',
            'CODE' => 'OPTIMIZATION_FOR_PROFIT_TITLE',
            'PROPERTY_TYPE' => PropertyTable::TYPE_STRING,
            'MULTIPLE' => 'N',
        ],
        [
            'NAME' => 'Наш подход - выводить блок',
            'ACTIVE' => 'Y',
            'CODE' => 'OUR_APPROACH_SHOW_BLOCK',
            'PROPERTY_TYPE' => PropertyTable::LISTBOX,
            'MULTIPLE' => 'N',
            'IS_REQUIRED' => 'N',
            'LIST_TYPE' => 'C',
            'VALUES' => [
                0 => [
                    'VALUE' => 'Y',
                    'DEF' => 'Y',
                    'SORT' => '500',
                ],
            ],
        ],
        [
            'NAME' => 'Наш подход - заголовок',
            'ACTIVE' => 'Y',
            'CODE' => 'OUR_APPROACH_TITLE',
            'PROPERTY_TYPE' => PropertyTable::TYPE_STRING,
            'MULTIPLE' => 'N',
        ],
        [
            'NAME' => 'История - выводить блок',
            'ACTIVE' => 'Y',
            'CODE' => 'HISTORY_SHOW_BLOCK',
            'PROPERTY_TYPE' => PropertyTable::LISTBOX,
            'MULTIPLE' => 'N',
            'IS_REQUIRED' => 'N',
            'LIST_TYPE' => 'C',
            'VALUES' => [
                0 => [
                    'VALUE' => 'Y',
                    'DEF' => 'Y',
                    'SORT' => '500',
                ],
            ],
        ],
        [
            'NAME' => 'История - заголовок',
            'ACTIVE' => 'Y',
            'CODE' => 'HISTORY_TITLE',
            'PROPERTY_TYPE' => PropertyTable::TYPE_STRING,
            'MULTIPLE' => 'N',
        ],
        [
            'NAME' => 'Продукты экосистемы - выводить блок',
            'ACTIVE' => 'Y',
            'CODE' => 'PRODUCTS_ECOSYSTEM_SHOW_BLOCK',
            'PROPERTY_TYPE' => PropertyTable::LISTBOX,
            'MULTIPLE' => 'N',
            'IS_REQUIRED' => 'N',
            'LIST_TYPE' => 'C',
            'VALUES' => [
                0 => [
                    'VALUE' => 'Y',
                    'DEF' => 'Y',
                    'SORT' => '500',
                ],
            ],
        ],
        [
            'NAME' => 'Продукты экосистемы - заголовок',
            'ACTIVE' => 'Y',
            'CODE' => 'PRODUCTS_ECOSYSTEM_TITLE',
            'PROPERTY_TYPE' => PropertyTable::TYPE_STRING,
            'MULTIPLE' => 'N',
        ],
        [
            'NAME' => 'Новости компании - выводить блок',
            'ACTIVE' => 'Y',
            'CODE' => 'NEWS_COMPANY_SHOW_BLOCK',
            'PROPERTY_TYPE' => PropertyTable::LISTBOX,
            'MULTIPLE' => 'N',
            'IS_REQUIRED' => 'N',
            'LIST_TYPE' => 'C',
            'VALUES' => [
                0 => [
                    'VALUE' => 'Y',
                    'DEF' => 'Y',
                    'SORT' => '500',
                ],
            ],
        ],
        [
            'NAME' => 'Новости компании - заголовок',
            'ACTIVE' => 'Y',
            'CODE' => 'NEWS_COMPANY_TITLE',
            'PROPERTY_TYPE' => PropertyTable::TYPE_STRING,
            'MULTIPLE' => 'N',
        ],
        [
            'NAME' => 'Документы - выводить блок',
            'ACTIVE' => 'Y',
            'CODE' => 'DOCUMENT_SHOW_BLOCK',
            'PROPERTY_TYPE' => PropertyTable::LISTBOX,
            'MULTIPLE' => 'N',
            'IS_REQUIRED' => 'N',
            'LIST_TYPE' => 'C',
            'VALUES' => [
                0 => [
                    'VALUE' => 'Y',
                    'DEF' => 'Y',
                    'SORT' => '500',
                ],
            ],
        ],
        [
            'NAME' => 'Документы - заголовок',
            'ACTIVE' => 'Y',
            'CODE' => 'DOCUMENT_TITLE',
            'PROPERTY_TYPE' => PropertyTable::TYPE_STRING,
            'MULTIPLE' => 'N',
        ],
    ];

    /**
     * @var array|array[]
     */
    protected array $iblockElementFormData = [
        'Настройка элемента инфоблока|edit1' => [  // название вкладки
            'NAME' => 'Название',
            'DATE_CREATE' => 'Создан',
            'TIMESTAMP_X' => 'Изменен',
            'CODE' => 'Символьный код',
            'ACTIVE' => 'Активность',

            'IPROPERTY_TEMPLATES_ELEMENT_META_TITLE' => 'Шаблон META TITLE',
            'IPROPERTY_TEMPLATES_ELEMENT_META_DESCRIPTION' => 'Шаблон META DESCRIPTION',
            'IPROPERTY_TEMPLATES_ELEMENT_META_KEYWORDS' => 'Шаблон META KEYWORDS',
        ],
        'Оптимизация для роста прибыли|edit2' => [
            'PROPERTY_OPTIMIZATION_FOR_PROFIT_SHOW_BLOCK' => 'Оптимизация для роста прибыли - выводить блок',
            'PROPERTY_OPTIMIZATION_FOR_PROFIT_TITLE' => 'Оптимизация для роста прибыли - заголовок',
        ],
        'Наш подход|edit3' => [
            'PROPERTY_OUR_APPROACH_SHOW_BLOCK' => 'Наш подход - выводить блок',
            'PROPERTY_OUR_APPROACH_TITLE' => 'Наш подход - заголовок',
        ],
        'История|edit4' => [
            'PROPERTY_HISTORY_SHOW_BLOCK' => 'История - выводить блок',
            'PROPERTY_HISTORY_TITLE' => 'История - заголовок',
        ],
        'Продукты экосистемы|edit5' => [
            'PROPERTY_PRODUCTS_ECOSYSTEM_SHOW_BLOCK' => 'Продукты экосистемы - выводить блок',
            'PROPERTY_PRODUCTS_ECOSYSTEM_TITLE' => 'Продукты экосистемы - заголовок',
        ],
        'Новости компании|edit6' => [
            'PROPERTY_NEWS_COMPANY_SHOW_BLOCK' => 'Новости компании - выводить блок',
            'PROPERTY_NEWS_COMPANY_TITLE' => 'Новости компании - заголовок',
        ],
        'Документы|edit7' => [
            'PROPERTY_DOCUMENT_SHOW_BLOCK' => 'Документы - выводить блок',
            'PROPERTY_DOCUMENT_TITLE' => 'Документы - заголовок',
        ],
    ];

    /**
     * @var array|string[]
     */
    protected array $iblockPermissionsData = [
        'administrators' => 'X',
        CONTENT_EDITOR_UG_ID => 'W',
        'everyone' => 'R',
    ];

    /**
     * @return bool
     */
    public function up(): bool
    {
        try {
            $helper = $this->getHelperManager();

            // Создаём тип инфоблока
            $helper->Iblock()->addIblockTypeIfNotExists($this->iblockTypeData);

            // Создаем инфоблок
            $iblockId = $helper->Iblock()->addIblockIfNotExists($this->iblockData);
            $this->outInfo("Создан инфоблок {$this->iblockData['CODE']}");

            // Применяем настройки групповых прав для инфоблока
            $helper->Iblock()->saveGroupPermissions($iblockId, $this->iblockPermissionsData);
            $this->outInfo("Применены права доступа к инфоблоку ID={$iblockId}");

            // Создаем свойства инфоблока
            foreach ($this->iblockPropertiesData as $propertyData) {
                $helper->Iblock()->addPropertyIfNotExists(
                    $iblockId,
                    $propertyData,
                );
                $this->outInfo("Добавлено свойство инфоблока {$propertyData['CODE']}");
            }

            // Сохраняем настройки формы редактирования элементов инфоблока
            $helper->UserOptions()->saveElementForm($iblockId, $this->iblockElementFormData);
            $this->outInfo("Применены настройки формы редактирования элементов инфоблока ID={$iblockId}");

            $this->outSuccess("Установка миграции на инфоблок `" . $this->iblockData['CODE'] . "` прошла успешно.");

            return true;
        } catch (Throwable $e) {
            $this->outError("Не удалось установить миграцию.");
            $this->outException($e);

            return false;
        }
    }

    /**
     * @return bool
     */
    public function down(): bool
    {
        try {
            $helper = $this->getHelperManager();

            // Удаляем инфоблок
            $helper->Iblock()->deleteIblockIfExists($this->iblockData['CODE']);
            $this->outInfo("Удален инфоблок {$this->iblockData['CODE']}");

            $this->outSuccess("Откат миграции на инфоблок `" . $this->iblockData['CODE'] . "` прошел успешно.");

            // Удаляем тип инфоблока
            $helper->Iblock()->deleteIblockTypeIfExists($this->iblockData['IBLOCK_TYPE_ID']);
            $this->outInfo("Удален тип инфоблока {$this->iblockData['IBLOCK_TYPE_ID']}");

            return true;
        } catch (Throwable $e) {
            $this->outError("Не удалось откатить миграцию.");
            $this->outException($e);

            return false;
        }
    }
}
