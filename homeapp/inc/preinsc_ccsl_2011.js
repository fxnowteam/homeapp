function spg(page){
    getId("homeapresentacao").className = "outro";
    getId("preinscricao").className = "outro";
    getId("maisinfo").className = "outro";
    getId(page).className = "li_selecionado";
    
    getId("page_homeapresentacao").style.display = "none";
    getId("page_preinscricao").style.display = "none";
    getId("page_maisinfo").style.display = "none";
    /*getId("page_"+page).style.display = "block";
   
    $("#page_homeapresentacao").fadeOut("slow");
    $("#page_preinscricao").fadeOut("slow");
    $("#page_maisinfo").fadeOut("slow");
    window.setInterval(jsFadein(page),3000);*/
    $("#page_"+page).fadeIn("slow")
}
/*
function jsFadein(page){
    $("#page_"+page).fadeIn("slow")
}
*/