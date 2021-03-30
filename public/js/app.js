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
