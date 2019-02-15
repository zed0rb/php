$(document).ready(function(){

    $('#limitSelect').on('change', function() {
        var url_string = window.location.href;
        var url = new URL(url_string);
        var params = url.searchParams;
        params.set("limit", this.value);

        window.location.search = params.toString();
    });


    $('#filter').on('click', function() {
        $('#searchForm').removeClass('hidden');
    });
    $('#hide').on('click', function() {
        $('#searchForm').addClass('hidden');
    });
    $('#clean').on('click', function() {
        var url_string = window.location.href;
        var url = new URL(url_string);
        var params = url.searchParams;
        params.delete("name");
        params.delete("last_name");
        params.delete("number");
        params.delete("search");
        window.location.search = params.toString();
    });

    var url_string = window.location.href;
    var url = new URL(url_string);
    if(url.searchParams.has('search')) {
        $('#searchForm').removeClass('hidden');
    }



});