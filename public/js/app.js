$(".tab--media--video").hide(); //Hide all content
//$("ul.ul--tab li:first").addClass("active").show(); //Activate first tab
$(".tab--media:first").show(); //Show first tab content


	//On Click Event
$(".li--tab").click(function() {
    
    let $this = $(this)
    let $activeTab = $(this).attr("id");
    let $content = $this.parent().parent().next()

    console.log($content.attr('data-tab'));

    
    if($content.attr('data-tab') != $activeTab){
        $content.hide();
        $content.next().show();
        let $contentMe = $content.next();
    } 
	//$("ul.tabs li").removeClass("active"); //Remove any "active" class
// 	$(this).addClass("active"); //Add "active" class to selected tab
// 	$(".tab--media").hide(); //Hide all tab content

	//Find the href attribute value to identify the active tab + content
    
    // 	$(activeTab).fadeIn(); //Fade in the active ID content
// 	return false;
});
