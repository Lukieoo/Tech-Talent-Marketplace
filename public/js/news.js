var container = document.getElementById('content');
window.onload = function () {
    LoadGuardianNews();
}

function LoadGuardianNews() {
    var url = "https://content.guardianapis.com/search?q=technology/technology&show-tags=contributor&show-fields=headline,thumbnail,trailText";
    url += '&' + new URLSearchParams({
        'api-key': "2293dde1-7aa6-4cd2-a1d0-3ea3db6375d8"
    });

    fetch(url)
        .then(function (response) {
            return response.json();
        })
        .then(function (result) {
            var articles = result.response.results;
            for (var i = 0; i < articles.length; i++) {
                var title = articles[i].webTitle;
                var abstract = articles[i].fields.trailText;
                var image = articles[i].fields.thumbnail;
                var website = articles[i].webUrl;
                container.innerHTML += '<div style="overflow: auto; padding: 20px; margin: 20px 20px;border-radius: 10px;"><h3>' + title + '</h3>' + '<img style="float:left;width:170px; margin-right: 10px;" src="' + image + '"></img>' + '<p>' + abstract + '</p>' + '<a href="' + website + '">Read More</a><br><br>';
            }
        })
        .catch(function (err) {
            throw err;
        });
}