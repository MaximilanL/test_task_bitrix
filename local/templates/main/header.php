<?use Bitrix\Main, Bitrix\Main\Page\Asset, \Bitrix\Main\Localization\Loc;
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
global $APPLICATION;
$dir=$APPLICATION->GetCurDir();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?$APPLICATION->ShowHead();?>

    <title><?$APPLICATION->ShowTitle()?></title>

    <?
    //Bootstrap core CSS
    $APPLICATION->SetAdditionalCss("/local/templates/main/assets/dist/css/bootstrap.min.css");
    //Custom styles for this template
    $APPLICATION->SetAdditionalCss("/local/templates/main/assets/dist/css/blog.css");

    $APPLICATION->AddHeadString('<link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">');
    ?>

</head>
<body>
<?$APPLICATION->ShowPanel();?>
<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-12 text-center">
                <?if($dir!="/"){?>
                <a class="blog-header-logo text-dark" href="/">
                <?}?>
                <span class="blog-header-logo text-dark"> RBC Feed</span>
                <?if($dir!="/"){?>
                </a>
                <?}?>
            </div>
        </div>
    </header>
