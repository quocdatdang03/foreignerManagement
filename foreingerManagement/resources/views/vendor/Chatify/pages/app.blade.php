@include('Chatify::layouts.headLinks')
<div class="messenger">
    {{-- ----------------------Users/Groups lists side---------------------- --}}
    <div class="messenger-listView {{ !!$id ? 'conversation-active' : '' }}">
        {{-- Header and search bar --}}
        <div class="m-header">
            <nav>
                <a href="#"><i class="fas fa-inbox"></i> <span class="messenger-headTitle">TIN NHẮN</span> </a>
                {{-- header buttons --}}
                <nav class="m-header-right">
                    <a href="#" onclick="toggleMinimize(); return false;"><i class="minimize-btn-plus fas fa-plus"></i></a>
                </nav>
            </nav>
            {{-- Search input --}}
            <input type="text" class="messenger-search" placeholder="Tìm kiếm" />
            {{-- Tabs --}}
            {{-- <div class="messenger-listView-tabs">
                <a href="#" class="active-tab" data-view="users">
                    <span class="far fa-user"></span> Contacts</a>
            </div> --}}
        </div>
        {{-- tabs and lists --}}
        <div class="m-body contacts-container">
           {{-- Lists [Users/Group] --}}
           {{-- ---------------- [ User Tab ] ---------------- --}}
           <div class="show messenger-tab users-tab" data-view="users">
               {{-- Favorites --}}
               <div class="favorites-section">
                <p class="messenger-title"><span>Yêu thích</span></p>
                <div class="messenger-favorites"></div>
               </div>
               {{-- Saved Messages --}}
               {{-- <p class="messenger-title"><span>Your Space</span></p> --}}
               {!! view('Chatify::layouts.listItem', ['get' => 'saved']) !!}
               {{-- Contact --}}
               <div class="listOfContacts" style="width: 100%;height: calc(100% - 272px);position: relative;"></div>
           </div>
             {{-- ---------------- [ Search Tab ] ---------------- --}}
           <div class="messenger-tab search-tab" data-view="search">
                {{-- items --}}
                <div class="search-records">
                    <p class="message-hint center-el"><span>Nhập để tìm kiếm...</span></p>
                </div>
             </div>
        </div>
    </div>

    {{-- ----------------------Messaging side---------------------- --}}
    <div class="messenger-messagingView">
        {{-- header title [conversation name] amd buttons --}}
        <div class="m-header m-header-messaging">
            <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                {{-- header back button, avatar and user name --}}
                <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                    <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                    <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                    </div>
                    <a href="#" class="user-name">{{ config('chatify.name') }}</a>
                </div>
                {{-- header buttons --}}
                <nav class="m-header-right">
                    {{-- <a href="#" class="add-to-favorite"><i class="fas fa-star"></i></a> --}}
                    <a href="/home"><i class="fas fa-home"></i></a>
                    <a href="/home" onclick="toggleMinimize()"><i class="minimize-btn-minus fas fa-minus"></i></a>
                </nav>
            </nav>
            {{-- Internet connection --}}
            <div class="internet-connection">
                <span class="ic-connected">Đã kết nối</span>
                <span class="ic-connecting">Đang kết nối...</span>
                <span class="ic-noInternet">Không thể truy cập</span>
            </div>
        </div>

        {{-- Messaging area --}}
        <div class="m-body messages-container">
            <div class="messages">
                <p class="message-hint center-el"><span>Vui lòng chọn một tin nhắn để bắt đầu</span></p>
            </div>
            {{-- Typing indicator --}}
            <div class="typing-indicator">
                <div class="message-card typing">
                    <div class="message">
                        <span class="typing-dots">
                            <span class="dot dot-1"></span>
                            <span class="dot dot-2"></span>
                            <span class="dot dot-3"></span>
                        </span>
                    </div>
                </div>
            </div>

        </div>
        {{-- Send Message Form --}}
        @include('Chatify::layouts.sendForm')
    </div>
</div>

@include('Chatify::layouts.modals')
@include('Chatify::layouts.footerLinks')

<script>
    function toggleMinimize() {
        const messenger = document.querySelector('.messenger');
        const minimizeIconPlus = document.querySelector('.minimize-btn-plus');
        const minimizeIconMinus = document.querySelector('.minimize-btn-minus');

        messenger.classList.toggle('minimized');
        
        if (messenger.classList.contains('minimized')) {
            minimizeIconPlus.style.display = 'none';
            minimizeIconMinus.style.display = 'block';
        } else {
            minimizeIconMinus.style.display = 'none';
            minimizeIconPlus.style.display = 'block';
        }
    }
</script>

<style>
    a {
        list-style: none;
        color: blue;
        text-decoration: none;
    }
    .messenger {
        position: fixed;
        bottom: 0px;
        right: 5px;
        width: 180px;
        height: 50px;
        background-color: #bebebe;
        z-index: 9999;
    }
    .messenger.minimized {
        width: 640px;
        height: 500px;
        background-color: #f3f3f3;
    }

    .messenger.minimized .m-body {
        display: block;
    }

    .messenger.minimized .m-header {
        display: block;
    }
    .messenger-messagingView {
        background-color: aliceblue;
    }
</style>
