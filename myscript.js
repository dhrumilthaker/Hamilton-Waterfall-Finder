            var map, loc, infobox; //variable for Map, User Location, and Infobox
            var directionsManager; //variable of direction manager
            var searchManager; //variable of search manager
            var result;

            $(document).ready(function () {
                $.ajax({
                    method: "GET",
                    url: "data.php",
                }).done(function (data) {
                    result = JSON.parse(data);
                });

            });


            // function that is called when Bing Maps finishes loading
            function loadMapScenario() {

                // create map centered map of Hamilton
                map = new Microsoft.Maps.Map('#myMap', {
                    center: new Microsoft.Maps.Location(43.254, -79.863),
                    zoom: 12
                });


                //Load the directions module.
                Microsoft.Maps.loadModule('Microsoft.Maps.Directions', function () {
                    //Create an instance of the directions manager.
                    directionsManager = new Microsoft.Maps.Directions.DirectionsManager(map);
                    //Specify where to display the route instructions.
                    directionsManager.setRenderOptions({
                        itineraryContainer: '#directionsItinerary'
                    });
                    //Specify the where to display the input panel
                    directionsManager.showInputPanel('directionsPanel');
                });



                //Request the user's location
                function success(position) {
                    loc = new Microsoft.Maps.Location(
                        position.coords.latitude,
                        position.coords.longitude);

                    //Add a pushpin at the user's location.
                    var pin = new Microsoft.Maps.Pushpin(loc, {
                        color: 'green'
                    });


                    pin.metadata = {
                        title: 'User',
                        description: "Longitude :" + position.coords.longitude + "<br> Latitude:" + position.coords.latitude
                    };


                    //Add a click event handler to the pushpin.
                    Microsoft.Maps.Events.addHandler(pin, 'click', pushpinClicked);


                    map.entities.push(pin);

                    //Center the map on the user's location.
                    map.setView({
                        location: loc,
                        zoom: 12
                    });

                    All();

                }

                //error message if user denies location access
                function error(noPosition) {
                    document.getElementById('error').innerHTML = "PERMISSION_DENIED: The Location acquisition process <b>Failed</b> Because the Document does<br> not have permission to use the Location API";
                    pageScroll();
                    map.setView({
                        zoom: 15
                    });
                }

                //Create an infobox at the center of the map but don't show it.
                infobox = new Microsoft.Maps.Infobox(loc, {
                    visible: false
                });

                infobox.setMap(map);


                navigator.geolocation.getCurrentPosition(success, error); //check if user allow location access or not.

            }



            //all school data
            function All() {


                //remove infobox of other category's school
                infobox.setOptions({
                    visible: false
                })



                //var databaseLength = Object.keys(result).length;

                // Loop over the result data
                for (i = 0; i < result.length; i++) {


                    // create a new location for this result 
                    var location = new Microsoft.Maps.Location(
                        result[i].LATITUDE,
                        result[i].LONGITUDE
                    );


                    // create a pushpin at this location, give it a label with 
                    // the school name
                    var pushpin = new Microsoft.Maps.Pushpin(
                        location, {
                            icon: 'pushpin.png',
                            iconSize: {
                                width: 20,
                                height: 22
                            }
                        });

                    //set info to infobox on pushpin
                    pushpin.metadata = {
                        description: "Waterfall:" + result[i].NAME + "</a>" + "<br>" + 'Community: ' + result[i].COMMUNITY + "<br>" + 'Type: ' + result[i].TYPE + "<br>" + 'Ranking: ' + result[i].RANKING + "<br>" + "<a href='#' onclick='return Direction(" + result[i].LATITUDE + "," + result[i].LONGITUDE + ");" + "'>Direction</a>"

                    };

                    //Add a click event handler to the pushpin.
                    Microsoft.Maps.Events.addHandler(pushpin, 'click', pushpinClicked);


                    // add the pushpin to the map
                    map.entities.push(pushpin);
                }

                directionsManager.clearAll(); //clear all direction created before

            }

            //set info to infobox when pushpin clicked
            function pushpinClicked(e) {
                //Make sure the infobox has metadata to display.
                if (e.target.metadata) {
                    //Set the infobox options with the metadata of the pushpin.
                    infobox.setOptions({
                        location: e.target.getLocation(),
                        title: e.target.metadata.title,
                        description: e.target.metadata.description,
                        visible: true
                    });
                }
            }


            //create direction from user to fall location
            function Direction(tempLatitude, tempLongitude) {



                //Clear any previously calculated directions.
                directionsManager.clearAll();
                directionsManager.clearDisplay();

                //Create waypoints to route between.
                var userLocation = new Microsoft.Maps.Directions.Waypoint({
                    address: 'User',
                    location: loc
                });
                directionsManager.addWaypoint(userLocation);

                var fallWaypoint = new Microsoft.Maps.Directions.Waypoint({
                    address: 'fall',
                    location: new Microsoft.Maps.Location(tempLatitude, tempLongitude)
                });
                directionsManager.addWaypoint(fallWaypoint);


                //Calculate directions.
                directionsManager.calculateDirections();

            }





            //            //remove pushpin
            //            function removePushpin() {
            //                for (var i = map.entities.getLength() - 1; i >= 0; i--) {
            //                    var pushpin = map.entities.get(i);
            //                    if (pushpin instanceof Microsoft.Maps.Pushpin) {
            //                        map.entities.removeAt(i);
            //                    }
            //
            //                }
            //            }
