var initPos;
 
// マップの初期設定
function initializeMap(latitude, longitude) {
    // // Mapクラスのインスタンスを作成（緯度経度は池袋駅に設定）
    initPos = new google.maps.LatLng(latitude, longitude);

    //対応させるテキストボックス
    var input = document.getElementById('place');
    var bounds = new google.maps.LatLngBounds(initPos, initPos);

　　//オートコンプリートのオプション
    var options = {
        location: initPos,                            // 範囲優先検索
        bounds: bounds,                            // 範囲優先検索
    };
    autocomplete = new google.maps.places.Autocomplete(input, options);
    
    autocomplete.setFields(['formatted_address', 'geometry', 'name']); // Set the data fields to return when the user selects a place.
    autocomplete.addListener('place_changed', getPlaceInfo);
}


function getPlaceInfo() {
    var place = autocomplete.getPlace();
    // console.log(place);
    // console.log(place.formatted_address);
    // console.log(place.name);
    // console.log(place.geometry.location.lat());
    // console.log(place.geometry.location.lng());

    setInputPlace(place.name);
    setInputAddress(place.formatted_address);
    setInputLocation(place.geometry.location.lat(), place.geometry.location.lng()); // setting up current location

  }


// ページ読み込み完了後、Googleマップを表示
// google.maps.event.addDomListener(window, 'load', initialize);