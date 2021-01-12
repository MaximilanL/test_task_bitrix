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

<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    <article class="blog-post" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
        <h2 class="blog-post-title"><?echo $arItem["NAME"]?></h2>
        <p class="blog-post-meta">
            <?=$arItem['DATE_CREATE']?>
            <?if(!empty($arItem['PROPERTIES']['AUTHOR']['VALUE'])){?>
               , Автор: <?=$arItem['PROPERTIES']['AUTHOR']['VALUE']?>
            <?}?>
        </p>
        <?if(!empty($arItem["PREVIEW_PICTURE"]["SRC"])){?>
            <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="140" height="120">
        <?}?>
        <p><?=$arItem["PREVIEW_TEXT"]?></p>
        </a>
    </article><!-- /.blog-post -->
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>

