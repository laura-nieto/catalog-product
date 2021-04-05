/* NAV BUTTON RESPONSIVE */
const buttonMenu = document.querySelector('.button-dropdown');
const dropdown = document.querySelector('.dropdown--content')

if (buttonMenu) {
    buttonMenu.addEventListener('click', () => {
        if (dropdown.style.display === 'none') {
            dropdown.style.display = 'block'
        } else {
            dropdown.style.display = 'none'
        }
    })
}

/* TABS MEDIA PRODUCT */
$(".tab--media--video").hide(); //Hide all content
$(".tab--media:first").show(); //Show first tab content

//On Click Event
$(".li--tab").click(function() {
    
    let $this = $(this),
        $others = $this.closest('li').siblings(),
        $divActive = $this.closest('div').siblings('div.active'),
        $divInactive = $this.closest('div').siblings('div.inactive')
    ;

    $others.removeClass('active');
    $this.addClass('active');
    $($divActive).hide();
    $($divInactive).show();

    $divActive.removeClass('active').addClass('inactive');
    $divInactive.removeClass('inactive').addClass('active')
});
