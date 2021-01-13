<?
CModule::IncludeModule("iblock");
$arRes = CIBlockRSS::GetNewsEx("static.feed.rbc.ru", 80, "/rbc/logical/footer/news.rss", "");
$arRes = CIBlockRSS::FormatArray($arRes);

foreach ($arRes['item'] as $news){
    $arSelect = Array("ID", "NAME");
    $arFilter = Array("IBLOCK_ID"=>IntVal(1), "=NAME"=>trim($news['title']));
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
    if(!$ob = $res->GetNext())
    {
        $el = new CIBlockElement;

        $PROP = array();
        if(!empty($news['author'])){
            $PROP['AUTHOR'] = $news['author'];
        }
        if(!empty($news['link'])){
            $PROP['LINK'] = $news['link'];
        }

        $preview_picture ='';
        if(!empty($news['enclosure'])){
            if($news['enclosure']['type']!="video/mp4"){
                $preview_picture=$news['enclosure']['url'];
            } else {
                $PROP["VIDEO_LINK"] = $news['enclosure']['url'];
            }
        }

        $arLoadProductArray = array(
            "DATE_CREATE"=>date('d.m.Y H:i:s', strtotime($news["pubDate"])),
            "MODIFIED_BY" => 1,
            "IBLOCK_SECTION_ID" => false,
            "IBLOCK_ID" => 1,
            "PROPERTY_VALUES" => $PROP,
            "NAME" => trim($news['title']),
            "ACTIVE" => "Y",
            "PREVIEW_TEXT" => $news['description'],
            "DETAIL_TEXT" => "",
            "PREVIEW_PICTURE"=>CFile::MakeFileArray($preview_picture)
        );

        $el->Add($arLoadProductArray);
    }
}
?>