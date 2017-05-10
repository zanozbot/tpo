$(function() {
    var ps = $("#ps");
    var nadomestna_ps = $("#nadomestna_ps");

    var selected;

    ps.on('change', function() {
        if (selected) {
            var option = $("option[value='" + selected + "']", nadomestna_ps);
            option.removeAttr("disabled");
            nadomestna_ps.prop('selectedIndex',0);
        }
        selected = this.value;
        var option = $("option[value='" + this.value + "']", nadomestna_ps);
        option.attr("disabled", "disabled");
    });
});
