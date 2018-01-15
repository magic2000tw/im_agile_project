# 簡介
生活在充滿各種壓力的都市中，你是否也想來一趟放鬆的輕旅行呢?由HTML、Bootstrap結合Google API所開發的旅遊規劃網，可以瀏覽人氣行程、景點以及各種美食小吃，讓你依照喜好隨時規劃旅行各個行程景點。

# 使用套件
## [Start Bootstrap - Simple Sidebar](https://startbootstrap.com/template-overviews/simple-sidebar/)

[Simple Sidebar](http://startbootstrap.com/template-overviews/simple-sidebar/) is an off canvas sidebar navigation template for [Bootstrap](http://getbootstrap.com/) created by [Start Bootstrap](http://startbootstrap.com/).

### Preview

[![Simple Sidebar Preview](https://startbootstrap.com/assets/img/templates/simple-sidebar.jpg)](https://blackrockdigital.github.io/startbootstrap-simple-sidebar/)

**[View Live Preview](https://blackrockdigital.github.io/startbootstrap-simple-sidebar/)**

### Status

[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://raw.githubusercontent.com/BlackrockDigital/startbootstrap-simple-sidebar/master/LICENSE)
[![npm version](https://img.shields.io/npm/v/startbootstrap-simple-sidebar.svg)](https://www.npmjs.com/package/startbootstrap-simple-sidebar)
[![Build Status](https://travis-ci.org/BlackrockDigital/startbootstrap-simple-sidebar.svg?branch=master)](https://travis-ci.org/BlackrockDigital/startbootstrap-simple-sidebar)
[![dependencies Status](https://david-dm.org/BlackrockDigital/startbootstrap-simple-sidebar/status.svg)](https://david-dm.org/BlackrockDigital/startbootstrap-simple-sidebar)
[![devDependencies Status](https://david-dm.org/BlackrockDigital/startbootstrap-simple-sidebar/dev-status.svg)](https://david-dm.org/BlackrockDigital/startbootstrap-simple-sidebar?type=dev)

### Download and Installation

To begin using this template, choose one of the following options to get started:
* [Download the latest release on Start Bootstrap](https://startbootstrap.com/template-overviews/simple-sidebar/)
* Install via npm: `npm i startbootstrap-simple-sidebar`
* Clone the repo: `git clone https://github.com/BlackrockDigital/startbootstrap-simple-sidebar.git`
* [Fork, Clone, or Download on GitHub](https://github.com/BlackrockDigital/startbootstrap-simple-sidebar)

### Usage

#### Basic Usage

After downloading, simply edit the HTML and CSS files included with the template in your favorite text editor to make changes. These are the only files you need to worry about, you can ignore everything else! To preview the changes you make to the code, you can open the `index.html` file in your web browser.

### Advanced Usage

After installation, run `npm install` and then run `gulp dev` which will open up a preview of the template in your default browser, watch for changes to core template files, and live reload the browser when changes are saved. You can view the `gulpfile.js` to see which tasks are included with the dev environment.

### Bugs and Issues

Have a bug or an issue with this template? [Open a new issue](https://github.com/BlackrockDigital/startbootstrap-simple-sidebar/issues) here on GitHub or leave a comment on the [template overview page at Start Bootstrap](http://startbootstrap.com/template-overviews/simple-sidebar/).

### Custom Builds

You can hire Start Bootstrap to create a custom build of any template, or create something from scratch using Bootstrap. For more information, visit the **[custom design services page](https://startbootstrap.com/bootstrap-design-services/)**.

### About

Start Bootstrap is an open source library of free Bootstrap templates and themes. All of the free templates and themes on Start Bootstrap are released under the MIT license, which means you can use them for any purpose, even for commercial projects.

* https://startbootstrap.com
* https://twitter.com/SBootstrap

Start Bootstrap was created by and is maintained by **[David Miller](http://davidmiller.io/)**, Owner of [Blackrock Digital](http://blackrockdigital.io/).

* http://davidmiller.io
* https://twitter.com/davidmillerskt
* https://github.com/davidtmiller

Start Bootstrap is based on the [Bootstrap](http://getbootstrap.com/) framework created by [Mark Otto](https://twitter.com/mdo) and [Jacob Thorton](https://twitter.com/fat).

### Copyright and License

Copyright 2013-2017 Blackrock Digital LLC. Code released under the [MIT](https://github.com/BlackrockDigital/startbootstrap-simple-sidebar/blob/gh-pages/LICENSE) license.

## Google Map API

您可以根據「Google 地圖」的資料，將地圖新增至您的應用程式。 API 會自動處理對「Google 地圖」伺服器的存取、資料下載、地圖顯示，以及回應地圖手勢。
您也可以使用 API 呼叫，將標記、多邊形及疊加層新增至基本地圖，以及變更使用者觀看的特定地圖區域。 這些物件為地圖位置提供其他資訊，並允許使用者與地圖進行互動。
API 可讓您將以下圖形新增至地圖：

在地圖上錨定於特定位置的圖示（標記）。
● 多組線段（折線）。
● 閉合線段（多邊形）。
●  在地圖上錨定於特定位置的點陣圖圖形（地面疊加層）。
● 多組顯示在基本地圖方塊上方的影像（地圖方塊疊加層）。

### 目標對象

適用於熟悉 Android 開發與物件導向程式設計概念的人員。 您應該也要熟悉使用者觀點下的 Google 地圖。
此概念文件是專門設計來協助您使用 Google Maps Android API 快速開始探索及開發應用程式。 如需類別與方法的特定詳細資料，您也可以參閱參考文件。

### 資料引用標示需求

如果您在應用程式中使用 Google Maps Android API，便必須包括 Google Play 服務資料引用標示文字做為應用程式內「法律聲明」區段的一部分。
我們建議將法律聲明以獨立選單項目，或是以「關於」選單項目之一部分的形式呈現。
透過呼叫```GoogleApiAvailability.getOpenSourceSoftwareLicenseInfo```可以取得資料引用標示文字。

### 協助工具

Google Maps Android API 包括內建的協助工具支援。 本節包含協助工具功能的高階摘要，系統會自動為使用 API 的任何應用程式啟用這些功能。
當使用者在行動裝置上啟用 TalkBack 協助工具功能時，每在畫面上滑動一次，都會使焦點移至下一個 UI 元素。
（可替代單次滑動的手勢是，在介面上拖曳手指來探索 UI 元素）。 聚焦於某 UI 元素時，TalkBack 會讀出該元素名稱。 如果使用者在畫面任意處輕按兩下，就會執行聚焦的動作。

如需增強 Android 應用程式協助工具的指導方針，請參閱 Android 協助工具文件。 尤其是建議的做法為新增會描述地圖的宣告。 如果要指定宣告文字，請在檢視上呼叫```setContentDescription()```。

### 優點

)#### 適用於各種平台的 Google 地圖         ![image](https://ppt.cc/fLWn0x)(https://developers.google.com/maps/android/?hl=zh-tw

Google Maps API 適用於 Android、iOS、Web 瀏覽器，而且可透過 HTTP Web 服務使用。  
![image](https://ppt.cc/fa9iMx@.png)
