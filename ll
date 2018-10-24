<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="ManyMeanings">
    <base href="index.hml">
    <title>个人中心</title>
    <link rel="short icon" href="image/club.ico">
    <link rel="stylesheet" type="text/css" href="css/mycss.css">
    <link rel="stylesheet" type="text/css" href="css/userzone.css"
</head>
<body>
<div class="content">
    <!--上方导航栏-->
    <div class="global-nav">
        <ul>
            <li><a href="index.html">主页</a></li>
            <li><a href="userzone.html">用户</a></li>
            <li><a href="about.html">关于</a></li>
            <li style="float:right; padding-right: 15px"><a href="userzone.html">ManyMeanings</a></li>
        </ul>
    </div>

    <div class="club-nav">
        <ul>
            <li><img src="image/title.png" alt="mangyuan" style="margin-top: 5px; margin-left: 307px;"/></li>
            <li style="float:right; margin-top: 22px; margin-right: 290px;" >
                <div><form action="index.php" method="post">
                    <input class="search" type="text" placeholder="搜索你想知道的..." name="s" autocomplete="off">
                    <input class="button" type="submit" value="">
                </form>
                </div>
            </li>

        </ul>
    </div>

    <--正文栏-->
    <div class="message">
        <--头-->
        <div class="head-in-message">
            <img src="image/my.jpg" class="img-in-headmsg">
            <span class="name-in-message">ManyMeanings</span><br>
            <span class="sth-to-say">吾好梦中杀人</span>
        </div>

        <--文章-->
        <div class="articles-to-show">
            <div class="title-in-this">ManyMeanings的文章&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;<a href="userzone.html">(全部)</a></div>
            <div class="show-articles-blocks">
                <a class="title-in-show">孤独有毒</a>
                <div class="time-in-show">2018-10-02 00:00:00</div>
                <p>现在好多视频网站都有弹幕，刚知道有那玩意儿时我还不懂，为什么看个视频还要忍受被一排排字挡住画面的痛苦，后来渐渐明白，这是一群孤独的人相拥取暖的地方。一个人低头数着进度条，看到精彩处，浑身寒毛炸起，可是身边却没有一个能听你吐槽的人。</p>
            </div>
            <div class="show-articles-blocks">
                <a class="title-in-show">孤独有毒</a>
                <div class="time-in-show">2018-10-02 00:00:00</div>
                <p>现在好多视频网站都有弹幕，刚知道有那玩意儿时我还不懂，为什么看个视频还要忍受被一排排字挡住画面的痛苦，后来渐渐明白，这是一群孤独的人相拥取暖的地方。一个人低头数着进度条，看到精彩处，浑身寒毛炸起，可是身边却没有一个能听你吐槽的人。</p>
            </div>
            <div class="show-articles-blocks">
                <a class="title-in-show">孤独有毒</a>
                <div class="time-in-show">2018-10-02 00:00:00</div>
                <p>现在好多视频网站都有弹幕，刚知道有那玩意儿时我还不懂，为什么看个视频还要忍受被一排排字挡住画面的痛苦，后来渐渐明白，这是一群孤独的人相拥取暖的地方。一个人低头数着进度条，看到精彩处，浑身寒毛炸起，可是身边却没有一个能听你吐槽的人。</p>
            </div>
        </div>

        <div class="books-to-show">
            <div class="title-in-this">ManyMeanings的书&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;<a href="userzone.html">(全部)</a></div>
            <div>
                <span class="book-tip">读过</span>
                <img src="image/book.jpg">
                <img src="image/book.jpg">
                <img src="image/book.jpg">
                <img src="image/book.jpg">
                <img src="image/book.jpg">
            </div>
        </div>

        <div class="tv-to-show">
            <div class="title-in-this">ManyMeanings的影视&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;<a href="userzone.html">(全部)</a></div>
            <div>
                <span class="book-tip">看过</span>
                <img src="image/break.jpg">
                <img src="image/break.jpg">
                <img src="image/break.jpg">
                <img src="image/break.jpg">
                <img src="image/break.jpg">
            </div>
        </div>


    </div>
    <--侧边栏-->
    <div class="message-in-aside">
        <div class="msg-card">
            <img src="image/my.jpg">
            <span class="place">常居：浙江台州</span><br>
            <span class="time-to-join">2018-10-02&nbsp;加入</span><br>
            <span class="star">星辰：2颗</span>
            <div class="line"></div>
            <div class="word">本来以为是很简单的网站，但是要把所有的功能都做出来还是很麻烦的。github地址：https://github.com/ManyMeanings</div>
        </div>

        <div class="books-in-read">
            <div class="title-in-aside">ManyMeanings正在读的书&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;<a href="index.html">(全部)</a></div>
            <img src="image/book.jpg">
            <img src="image/book.jpg">
        </div>

        <div class="articles-in-aside">
            <div class="title-in-aside">ManyMeanings的热门文章&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;<a href="userzone.html">(全部)</a></div>
            <div class="new-articles"><a href="userzone.html">孤独有毒</a>&nbsp;(5颗星星)</div>
            <div class="new-articles"><a href="userzone.html">第二篇文章</a>&nbsp;(6颗星星)</div>
            <div class="new-articles"><a href="userzone.html">The Third Article</a>&nbsp;(7颗星星)</div>
            <div class="new-articles"><a href="userzone.html">123456</a>&nbsp;(8颗星星)</div>
            <div class="new-articles"><a href="userzone.html">凑数的</a>&nbsp;(123颗星星)</div>
        </div>

        <div class="articles-in-aside">
            <div class="title-in-aside">ManyMeanings喜欢的文章&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;<a href="index.html">(去主页)</a></div>
            <div class="hot-articles"><a href="userzone.html">孤独有毒</a><p>ManyMeanings&nbsp;10086人浏览<p></div>
            <div class="hot-articles"><a href="userzone.html">第二篇文章</a><p>ManyMeanings&nbsp;233人浏览<p></div>
            <div class="hot-articles"><a href="userzone.html">The Third Article</a><p>ManyMeanings&nbsp;8888人浏览<p></div>
            <div class="hot-articles"><a href="userzone.html">123456</a><p>ManyMeanings&nbsp;12345人浏览<p></div>
            <div class="hot-articles"><a href="userzone.html">凑数的</a><p>ManyMeanings&nbsp;555555人浏览<p></div>
        </div>



    </div>
</div>
<div class="footer">© 2001－2018 mangyuan.com, all rights reserved 杭州电子科技大学莽原文学社</div>
</body>
</html>


p {
    color: #555555;
    font-family: Helvetica, Arial, sans-serif;
    font-size: 14px;
    font-weight: normal;
    line-height: 21px;
}

.message {
    margin-top: 55px;
    margin-left: 312px;
    width: 675px;
    float: left;
}
.message-in-aside {
    float: right;
    margin-right: 275px;
    margin-top: 62px;
    width: 300px;
}
.msg-card {
    word-wrap: break-word;
    padding: 9px 9px;
    background: #fff6ed;
    border: 1px solid #faefe3;
    margin-bottom: 30px;
}
.msg-card img {
    width: 150px;
    height: 150px;
}
.place {
    font: 13px Arial, Helvetica, sans-serif;
    line-height: 150%;
    color: #666666;
    position: relative;
    top: -137px;
    left: +10px;
}
.time-to-join {
    font: 13px Arial, Helvetica, sans-serif;
    line-height: 150%;
    color: #666666;
    float: right;
    position: relative;
    top: -134px;
    left: -23px;
}
.star {
    font: 13px Arial, Helvetica, sans-serif;
    line-height: 150%;
    color: #666666;
    float: right;
    position: relative;
    left: +39px;
    top: -80px;
}
.line {
    clear: both;
    border-bottom: 1px solid #f5e9db;
    margin: 5px;
    overflow: hidden;
}
.word {
    font: 13px Arial, Helvetica, sans-serif;
    line-height: 150%;
    color: #666666;
    margin-top: 15px;
    margin-bottom: 10px;
}
/*左边*/
.img-in-headmsg {
    width: 48px;
    height: 48px;
}
.name-in-message {
    font-size: 26px;
    font-family: Arial, Helvetica, sans-serif;
    margin-left: 10px;
    word-wrap: break-word;
    font-weight: bold;
    color: #494949;
    padding: 0 0 15px 0;
    line-height: 1.1;
    position: relative;
    top: -27px;
}
.sth-to-say {
    font: 12px Arial, Helvetica, sans-serif;
    line-height: 150%;
    color: #666666;
    margin-left: 58px;
    position: relative;
    top: -18px;
}

/*书*/

.articles-to-show {
    margin-top: 50px;
}
.title-in-this {
    font: 16px Arial, Helvetica, sans-serif;
    color: #072;
    line-height: 24px;
    margin-bottom: 15px;
}
.title-in-this a {
    color: #072;
    font-family: Helvetica, Arial, sans-serif;
    font-size: 13px;
    text-decoration-line: none;
    cursor: pointer;
    font-weight: normal;
    line-height: 21px;
}
.title-in-this a:hover {
    color: #f2f2f2;
}
.title-in-show {
    color: #37a;
    font-family: Helvetica, Arial, sans-serif;
    font-size: 14px;
    text-decoration-line: none;
    cursor: pointer;
    font-weight: normal;
    line-height: 21px;
}
.title-in-show:hover {
    color: #f2f2f2;
}
.time-in-show {
    color: #aaaaaa;
    font-family: Helvetica, Arial, sans-serif;
    font-size: 13px;
    font-weight: normal;
    margin-top: 3px;
    margin-bottom: 10px;
}
.show-articles-blocks {
    margin-top: 20px;
}
/*书*/
.books-to-show {
    margin-top: 50px;
}
.book-tip {
    color: #acacac;
    float: left;
    line-height: 128px;
    height: 128px;
    font-size: 13px;
    width: 26px;
    white-space: nowrap;
}
.books-to-show img {
    height: 126.3px;
    width: 85px;
    margin-left: 40px;
}
.tv-to-show {
    margin-top: 50px;
}
.tv-to-show img{
    height: 126.3px;
    width: 85px;
    margin-left: 40px;
}

.articles-in-aside {
    margin-bottom: 30px;
    margin-left: 5px;
    padding-bottom: 5px;
    margin-top: 30px;
}
.title-in-aside {
    font: 16px Arial, Helvetica, sans-serif;
    color: #072;
    margin: 0 0 12px 0;
    line-height: 24px;

}
.title-in-aside a {
    color: #072;
    font-family: Helvetica, Arial, sans-serif;
    font-size: 13px;
    text-decoration-line: none;
    cursor: pointer;
    font-weight: normal;
    line-height: 21px;
}
.title-in-aside a:hover {
    color: #f2f2f2;
}
.new-articles a {
    color: #37a;
    font-family: Helvetica, Arial, sans-serif;
    font-size: 13px;
    text-decoration-line: none;
    cursor: pointer;
    font-weight: normal;
    line-height: 21px;
}
.new-articles a:hover {
    color: #f2f2f2;
}
.new-articles {
    color: #666;
    font-size: 13px;
    border-bottom: 1px dashed #ccc;
    padding: 0 0 5px 0;
    margin: 5px 0 0 0;
}

.hot-articles a {
    color: #37a;
    font-family: Helvetica, Arial, sans-serif;
    font-size: 14px;
    text-decoration-line: none;
    cursor: pointer;
    font-weight: normal;
    line-height: 21px;
}
.hot-articles a:hover {
    color: #f2f2f2;
}
.hot-articles {
    color: #666;
    font-size: 13px;
}
.hot-articles p {
    margin-bottom: 7px;
    font-size: 13px;
    line-height: 1;
    color: #aaaaaa;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.books-in-read img {
    height: 126.3px;
    width: 85px;
    margin-right: 40px;

}