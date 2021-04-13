{extends file='parent:_partials/footer.tpl'}

{block name='copyright_link'}
    {* debut permet d'afficher toutes les variables disponibles sur la page actuelle *}
    {*debug*}
    {*$shop|dump*}
    {* Pour Smarty ecrire $shop.name revient à faire $shop['name'] *}
    © {'Y'|date} - {$shop.name}
    
{/block}