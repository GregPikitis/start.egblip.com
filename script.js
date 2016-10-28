window.onload = function() {
    getConfig();

    count = -1;
    input = document.getElementById("input");
    websites = [];
    colors = [];

    input.addEventListener("keyup", search);
    document.getElementById("search").addEventListener("click", goToUrl);
    document.getElementById("calc").addEventListener("click", calc);
    document.getElementById("ac").addEventListener("click", calcQuit);
    document.getElementById("clear").addEventListener("click", calcClear);
    document.getElementById("weather").addEventListener("click", function() {
        window.location.assign("https://weather.yahoo.com/")
    });

    var add = document.getElementsByClassName("add");
    var adds = add[1].childNodes;
    for (var i = 0; i < add.length; i++) {
        var nums = add[i].childNodes;
        for (var j = 0; j < nums.length; j++) {
            nums[j].addEventListener("click", function() {
                input.value += this.innerHTML;
            }, false)
        }
    }
}

function getConfig() {
    var request = new XMLHttpRequest();
    request.overrideMimeType("application/json");
    request.open('GET', "config.json", true);
    request.onload = function() {
        if (request.status >= 200 && request.status < 400) {
            var config = JSON.parse(request.responseText);

            locate = config.location;
            metric = config.metric;
            meridiem = config.meridiem;
            searchEngine = config.searchEngine;

            for (i = 0; i < config.colors.length; i++) {
                colors.push(config.colors[i])
            }
            for (i = 0; i < config.websites.length; i++) {
                websites.push(config.websites[i]);
            }

            websites.sort();

        } else {
            console.log('Wrong request status');
        }
        clock();
        var e = colors[Math.floor(Math.random() * colors.length)];
        document.getElementById("clock").style.color = e,
        document.getElementById("search").style.background = e;
        document.getElementById("sidebarLeft1").style.background = e;
        document.getElementById("sidebarLeft2").style.background = e;
        document.getElementById("sidebarRight1").style.background = e;
        document.getElementById("sidebarRight2").style.background = e;
    };
    request.error = function() {
        console.log("config.json is missing");
    };
    request.send()
}

function clock() {
    var date = new Date,
        h = date.getHours(),
        m = date.getMinutes();
    if (meridiem == true) {
        a = (h >= 12)? ' PM' : ' AM';
        h = (h > 12)? h -12 : h;
        h = (h == '00')? 12 : h;
    } else
        a = ""
    10 > h && (h = "0" + h),
    10 > m && (m = "0" + m);

    document.getElementById("clock").textContent = h + ":" + m + a,
    setTimeout("clock()", 1000)
}



//
// Search Bar
//



function search(event) {
    document.getElementById("predictions").innerHTML = "";
    var pred = document.getElementsByClassName("prediction");
    var gray = "#303030";
    var input = document.getElementById("input").value.toLowerCase();
    if (input == "")
        return
    for (a = 0; a < websites.length; a++)
        if (websites[a][0].indexOf(input) == 0) {
            website = websites[a][1];
            name = websites[a][0];

            var str = document.createElement("a");

            str.setAttribute("href", website);
            str.className = "prediction";
            str.innerHTML = name;

            document.getElementById("predictions").appendChild(str);

            if (websites[a][0] == input)
                pred[0].style.background = gray
        }

    classCount = pred.length - 1;
    if (event.keyCode == 38) {
        if (count > 0)
            count--
        else
            count = -1;
        pred[count].style.background = gray;
        return
    } else if (event.keyCode == 40) {
        if (count < classCount)
            count++
        else
            count = classCount
        pred[count].style.background = gray;
        return
    } else if (event.keyCode == 13 && count < 0)
        goToUrl()
    else if (event.keyCode == 13 && count >= 0)
        window.location.assign(pred[count].href)
}

function goToUrl() {
    var c = document.getElementById("calculator"),
        i = document.getElementById("input"),
        t = i.value.toLowerCase();
    if ("" == t)
        i.focus()
    else if ("-" == t || "all" == t)
        listAll()
    else if ("=" == t || "calc" == t)
        calcShow()
    else if ("/" == t || "weather" == t)
        getWeather()
    else if ("?" == t || "help" == t)
        window.location.assign("https://github.com/Phydos/ditto/blob/gh-pages/README.md")
    else if (-1 < t.indexOf("=") && -1 == t.indexOf("http"))
        calc()
    else if (name == t)
        window.location.assign(website)
    else if (-1 < t.indexOf("i:"))
        window.location.assign("https://encrypted.google.com/search?&tbm=isch&q=" + t.replace(/i: |i:/g, ''))
    else if (-1 < t.indexOf("k:"))
        window.location.assign("https://kat.cr/usearch/" + t.replace(/k: |k:/g, '') + '/?field=seeders&sorder=desc')
    else if (-1 < t.indexOf("w:"))
        window.location.assign("https://en.wikipedia.org/w/index.php?search=" + t.replace(/w: |w:/g, ''))
    else if (-1 < t.indexOf("y:"))
        window.location.assign("https://www.youtube.com/results?search_query=" + t.replace(/y: |y:/g, ''))
    else if (-1 < t.indexOf(" "))
        window.location.assign(searchEngine + t)
    else if (-1 < t.indexOf("."))
        window.location.assign(-1 != t.indexOf("http") ? t : "http://" + t)
    else if (0 == t.indexOf("/r/"))
        window.location.assign("https://reddit.com" + t)
    else
        window.location.assign(searchEngine + t)
}



//
// Weather
//



function getWeather() {
    var weather = document.getElementById("weather");
    if (weather.innerHTML == "") {
        var request = new XMLHttpRequest();
        if (metric == true)
            var type = "c"
        else
            var type = "f"
        var locationQuery = escape("select * from weather.forecast where woeid in (select woeid from geo.places(1) where text='" + locate + "') and u='" + type + "'"),
            token = "https://query.yahooapis.com/v1/public/yql?q=" + locationQuery + "&format=json";
        request.open('GET', token, true);
        request.onload = function() {
            if (request.status >= 200 && request.status < 400) {
                var data = JSON.parse(request.responseText),
                    temp = "<div>" + Math.round(data.query.results.channel.item.condition.temp) + " &#186;" + data.query.results.channel.units.temperature + "</div>",
                    detail = data.query.results.channel.item.condition.text,
                    windspeed = "<div>" + Math.round(data.query.results.channel.wind.speed) + " " + data.query.results.channel.units.speed + "</div>";
                if (detail != "Unknown")
                    detail = "<div>" + detail + "</div>";
                else
                    detail = ""
                weather.innerHTML = temp + detail + windspeed;
            } else {
                alert('Something went wrong during the request...');
            }
        };
        request.error = function() {
            console.log("Invalid URL or YahooAPIs is down.");
        };
        request.send();
    } else
        weather.innerHTML = ""
    input.value = ""
}



//
//  List Websites
//



function listAll() {
    var all = document.getElementById("all");
    if (all.innerHTML == "")
        for (i = 0; i < websites.length; i++) {
            website = websites[i][1];
            name = websites[i][0];

            var a = document.createElement("a");
            a.setAttribute("href", website);
            a.innerHTML = name;

            all.appendChild(a);
        }
    else
        all.innerHTML = "";
    input.value = ""
}



//
//  Calculator
//



function calc() {
    document.getElementById("calculator").style.display = "block";
    var i = document.getElementById("input").value;
    var str = i.replace(/[^-()\d/*+.]/g, '');
    var answer = eval(str);
    document.getElementById("input").value = "=" + answer;
}

function calcShow() {
    var c = document.getElementById("calculator");
    if (c.style.display == "block") {
        c.style.display = "none";
        input.value = "";
    } else {
        c.style.display = "block";
        input.value = "=";
    }
}

function calcClear() {
    input.value = "="
}

function calcQuit() {
    document.getElementById("input").value = "";
    document.getElementById("calculator").style.display = "none";
}
