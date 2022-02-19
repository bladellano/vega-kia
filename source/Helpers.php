<?php

use Source\Models\Car;
use Source\Models\Post;

function getCarsMenu(): array
{
    return (new Car())->find("novo = :novo", 'novo=1')->fetch(true) ?? [];
}

function getSiteMap(): array
{
    return (new Post())->find("category_id = :category_id", 'category_id=1')->fetch(true) ?? [];
}

function buildBreadcrumb(): string
{
    $breadcrumb = array_filter(explode('/', $_SERVER['QUERY_STRING']));
    array_shift($breadcrumb);

    $acc = "";
    $html = "<li class='breadcrumb-item'><a href='" . SITE['root'] . "'>Home</a></li>";
    foreach ($breadcrumb as $link) :
        $acc .= DS . $link;

        /** Remove os detalhes da query string */
        if (strripos($link, "&") !== FALSE)
            $link = substr($link, 0, strpos($link, '&'));

        $html .= "<li class='breadcrumb-item'><a href='" . SITE['root'] . $acc . "'>" . ucfirst($link) . "</a></li>";
    endforeach;

    return $html;
}

/**
 * @param $param
 * @return string
 */
function money($param): string
{
    return number_format($param, '2', ',', '.');
}

/**
 * @param $param
 * @return string
 */
function moneyToDB($param): string
{
    $source = ['.', ','];
    $replace = ['', '.'];
    $value = str_replace($source, $replace, $param);
    return $value;
}

/**
 * @param string|null $param
 * @return string
 */
function site(string $param = null): string
{
    if ($param && !empty(SITE[$param])) {
        return SITE[$param];
    }
    return SITE["root"];
}

/**
 * Auxiliar no assets do projeto
 * @param string $path
 * @param string $folder
 * @param boolean $time
 * @return string
 */
function asset(string $path, $folder = '', $time = true): string
{
    if (!empty($folder))
        $folder = "{$folder}/";

    $file = SITE['root'] . "/views/assets/{$folder}{$path}";
    $fileOnDir = dirname(__DIR__, 1) . "/views/assets/{$folder}{$path}";
    if ($time && file_exists($fileOnDir)) {
        $file .= "?time=" . filemtime($fileOnDir);
    }
    return $file;
}

/**
 * @param string|null $type
 * @param string $message
 * @return string|null
 */
function flash(string $type = null, string $message = null): ?string
{
    if ($type && $message) {
        $_SESSION['flash'] = [
            "type" => $type,
            "message" => $message
        ];
        return null;
    }
    if (!empty($_SESSION['flash']) && $flash = $_SESSION['flash']) {
        unset($_SESSION['flash']);
        return "<div class=\"message {$flash["type"]}\">{$flash["message"]}</div>";
    }
    return null;
}

function convertDatePtbr($strdate)
{
    $DateTime = new DateTime($strdate);
    return $DateTime->format("d/m/Y H:i:s");
}

function normalizeFiles(&$files, $name = 'name')
{
    if (!count($files)) return [];
    $_files       = [];
    $_files_count = count($files[$name]);
    $_files_keys  = array_keys($files);

    for ($i = 0; $i < $_files_count; $i++)
        foreach ($_files_keys as $key)
            $_files[$i][$key] = $files[$key][$i];

    return $_files;
}

/**
 * Cria um novo array agrupado por nome da chave.
 * @param [type] $inputArray
 * @param [type] $nameColumn
 * @param boolean $oneMoreLevel
 * @return void
 */
function groupByColumn($inputArray, $nameColumn, $oneMoreLevel = true)
{
    $resultMap = [];

    foreach ($inputArray as $data) {
        if (!isset($resultMap[$data[$nameColumn]])) {
            $resultMap[$data[$nameColumn]] = [];
        }
        if ($oneMoreLevel) :
            $resultMap[$data[$nameColumn]][] = $data;
        else :
            $resultMap[$data[$nameColumn]] = $data;
        endif;
    }

    return $resultMap;
}
