<script src="/frontend/js/jquery.min.js"></script>
<script src="/frontend/js/bootstrap.min.js"></script>
<script>
    window.setTimeout("renderDate()",1);
    days = new Array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
    months = new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    function renderDate()
    {
        var mydate = new Date();
        var year = mydate.getYear();
        if (year < 2000)
        {
            if (document.all)
            year = "19" + year;
            else
            year += 1900;
        }
        var day = mydate.getDay();
        var month = mydate.getMonth();
        var daym = mydate.getDate();
        if (daym < 10)
        daym = "0" + daym;
        var hours = mydate.getHours();
        var minutes = mydate.getMinutes();
        var seconds = mydate.getSeconds();
        if (hours <= 9)
        hours = "0" + hours;
        if (minutes <= 9)
        minutes = "0" + minutes;
        if (seconds <= 9)
        seconds = "0" + seconds;
        document.getElementById("jam").innerHTML = "<B>"+days[day]+", "+daym+" "+months[month]+" "+year+"</B><br>"+hours+" : "+minutes+" : "+seconds;
        setTimeout("renderDate()",1000)
    }
</script>

<script src="/frontend/js/wow.min.js"></script>
<script src="/frontend/js/slick.min.js"></script>
<script src="/frontend/js/custom.js"></script>