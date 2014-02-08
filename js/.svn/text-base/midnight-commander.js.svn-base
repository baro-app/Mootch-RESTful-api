var po = org.polymaps;

var map = po.map()
    .center({lat: 40.7304, lon: -73.9364})
    .zoom(12)
    .container(document.getElementById("map").appendChild(po.svg("svg")))
    .add(po.interact())
    .add(po.hash());

map.add(po.image()
    .url(po.url("http://{S}tile.cloudmade.com"
    //+ "/1a1b06b230af4efdbb989ea99e9841af" // http://cloudmade.com/register
    + "/5223d491fc314d56bf42971c4f71c261"
    + "/999/256/{Z}/{X}/{Y}.png")
    .hosts(["a.", "b.", "c.", ""])));

map.add(po.compass()
    .pan("none"));
