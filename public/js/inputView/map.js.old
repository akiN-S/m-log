var mayMap;
var service;
 
// マップの初期設定
function initializeMap(latitude, longitude) {
    // Mapクラスのインスタンスを作成（緯度経度は池袋駅に設定）
    var initPos = new google.maps.LatLng(latitude, longitude);
    // 地図のプロパティを設定（倍率、マーカー表示位置、地図の種類）
    var myOptions = {
        zoom: 18,
        center: initPos,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    // #map_canva要素にMapクラスの新しいインスタンスを作成
    myMap = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    // 検索の条件を指定（緯度経度、半径、検索の分類）
    var request = {
        location: initPos,
        radius: 100,      // ※１ 表示する半径領域を設定(1 = 1m)
        // types: ['cafe'],    // ※２ typesプロパティの施設タイプを設定
        // fields: ["name", "formatted_address"]
    };

    // マップにマーカーを表示する
    myLocation = new google.maps.Marker({
        map: myMap, // mapに対して指定（マップオブジェクト作成したやつ）
        position:initPos, 
        icon: {
            url: 'https://higemura.com/wordpress/wp-content/uploads/2018/10/ic_gmap_mylocation.svg', // icon画像（png画像でも可）
            scaledSize: new google.maps.Size(32, 32) // 表示するアイコンサイズ
        },
        title: 'Current location', // アイコンにマウスホバーすると出てくる文言
    });


    var service = new google.maps.places.PlacesService(myMap);
    service.nearbySearch(request, Result_Places);
    // service.textSearch(request, Result_Places);
    // service.findPlaceFromQuery(request, Result_Places);


}
 
// 検索結果を受け取る
function Result_Places(results, status){
    // Placesが検家に成功したかとマうかをチェック
    if(status == google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
            // 検索結果の数だけ反復処理を変数placeに格納
            var place = results[i];
            createMarker({
                 text : place.name,
                 position : place.geometry.location
            });
        }
        console.log(results);
        // console.log(results[0].formatted_address);
        console.log(results[0].name);
    }
}
 
// 該当する位置にマーカーを表示
function createMarker(options) {
    // マップ情報を保持しているmyMapオブジェクトを指定
    options.map = myMap;
    // Markcrクラスのオブジェクトmarkerを作成
    var marker = new google.maps.Marker(options);
    // 各施設の吹き出し(情報ウインドウ)に表示させる処理
    var infoWnd = new google.maps.InfoWindow();
    infoWnd.setContent(options.text);
    // addListenerメソッドを使ってイベントリスナーを登録
    google.maps.event.addListener(marker, 'click', function(){
        infoWnd.open(myMap, marker);
    });
    return marker;
}
 
// ページ読み込み完了後、Googleマップを表示
// google.maps.event.addDomListener(window, 'load', initialize);