function checkInput() {
    if (document.edit.input_name_uji.value === "") alert("名前");
    if (document.edit.input_name_na.value === "") alert("名前");
    if (document.edit.input_name_uji_yomi.value === "") alert("名前読み");
    if (document.edit.input_name_na_yomi.value === "") alert("名前読み");
}

/*
 * なんかFalseを返せば、onSubmitで投稿を停止したり出来るらしいけどめんどくさい
 */
