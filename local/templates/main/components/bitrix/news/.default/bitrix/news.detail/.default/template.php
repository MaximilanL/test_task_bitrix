<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="news-detail">
    <h1><?=$arResult["NAME"]?></h1>
    <div class="dt_prsm"><?=$arResult["DATE_CREATE"]?> / Количество простмотров: <?if(empty($arResult['SHOW_COUNTER'])){?>1<?} else {?><?=$arResult['SHOW_COUNTER']?><?}?></div>
    <?if(!empty($arResult["DETAIL_PICTURE"]["SRC"])){?>
        <img
                class="detail_picture"
                border="0"
                src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
                width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
                height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
                alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
                title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
        />
    <?} else {?>
        <img
                class="detail_picture"
                border="0"
                src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>"
                width="<?=$arResult["PREVIEW_PICTURE"]["WIDTH"]?>"
                height="<?=$arResult["PREVIEW_PICTURE"]["HEIGHT"]?>"
                alt="<?=$arResult["PREVIEW_PICTURE"]["ALT"]?>"
                title="<?=$arResult["PREVIEW_PICTURE"]["TITLE"]?>"
        />
    <?}?>

    <?if(!empty($arResult['PROPERTIES']['VIDEO_LINK']['VALUE'])){?>
            <div>
                <video width="400" height="300" controls="controls" poster="video/duel.jpg">
                    <source src="<?=$arResult['PROPERTIES']['VIDEO_LINK']['VALUE']?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                    Тег video не поддерживается вашим браузером.
                </video>
            </div>
    <?}?>


    <?if(!empty($arResult["DETAIL_TEXT"])){?>
        <p><?=$arResult["DETAIL_TEXT"]?></p>
    <?} else {?>
        <p><?=$arResult["PREVIEW_TEXT"]?></p>
    <?}?>

    <?if(!empty($arResult["PROPERTIES"]["LINK"]['VALUE'])){?>
        <p>
            <a href="<?=$arResult["PROPERTIES"]["LINK"]['VALUE']?>">Читать на rbc.ru</a>
        </p>
    <?} ?>


	<?
	if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
	{
		?>
		<div class="news-detail-share">
			<noindex>
			<?
			$APPLICATION->IncludeComponent("bitrix:main.share", "", array(
					"HANDLERS" => $arParams["SHARE_HANDLERS"],
					"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
					"PAGE_TITLE" => $arResult["~NAME"],
					"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
					"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
					"HIDE" => $arParams["SHARE_HIDE"],
				),
				$component,
				array("HIDE_ICONS" => "Y")
			);
			?>
			</noindex>
		</div>
		<?
	}
	?>
</div>