$(document).ready(function() {    
    $("#toggleDropdown").on("click", function() {
        
        if($("#dropdown").hasClass("opened")) {
            $("#dropdown").removeClass("opened");
            $("#dropdown").addClass("closed");
        } else {
            $("#dropdown").removeClass("closed");
            $("#dropdown").addClass("opened");
        }
    });
    
    $("#searchInput > input").on("blur", function() {
        $("#searchInput > input").css({"width": "0px", "opacity" : "0"});
    });
    
    $("#searchButton").on("click", function() {
        $("#searchInput > input").css({"width": "180px", "opacity" : "1"});
        $("#searchInput > input").focus();
    });
    
    $("#searchInput > input").keypress(function(e) {
        if(e.which == 13) {
            window.location.replace(window.location.href.substring(0, window.location.href.lastIndexOf('/')) + "/search_results.php?search=" + $("#searchInput > input").val());
        }
    });
    
});