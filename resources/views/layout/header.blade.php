<div id="header-wrapper">
    <div id="header" class="container">
        <div id="logo">
            <h1><a href="#">SimpleWork</a></h1>
        </div>
        <div id="menu">
            <ul>
                <li class="{{ Request::path()==='/'?'current_page_item' : ''}}"><a href="/" accesskey="1" title="">Homepage</a></li>
                <li class="{{ Request::path()==='articles'?'current_page_item' : ''}}"><a href="/articles" accesskey="2" title="">Our articles</a></li>
                <li class="{{ Request::is('about') ? 'current_page_item':'' }}"><a href="/about" accesskey="3" title="">About Us</a></li>
                <li><a href="#" accesskey="4" title="">Careers</a></li>
                <li><a href="#" accesskey="5" title="">Contact Us</a></li>
            </ul>
        </div>
    </div>
    @yield('additional-header')
</div>

