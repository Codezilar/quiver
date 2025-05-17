<nav class="nav">
        <div class="top-nav">
            <div class="top-nav-left">
                <a href="#">codezilar@gmail.com</a>
                <a href="#">Help || Support</a>
            </div>

            <div class="search-movie">
                <div class="search-movie-container">
                    <form action="search.php" method="GET">
                        <input type="search" placeholder="Search here..." name="search">
                        <button type="submit" name="submit">
                            <i class="fas fa-search"></i>
                        </button>
                        
                    </form>
                </div>
            </div>

            <div class="top-nav-right">
                <a href="https://www.facebook.com/goodness.christopher.31392?mibextid=rS40aB7S9Ucbxw6v/"><i class="fab fa-facebook"></i></a>
                <a href="https://wa.me/+2347048632016/"><i class="fab fa-whatsapp"></i></a>
                <a href="https://ng.linkedin.com/in/goodness-christopher-53a215210/"><i class="fab fa-linkedin-in"></i></a>
                <a href="https://www.upwork.com/freelancers/~01c05c223ed46dd63f"><img src="https://tse4.mm.bing.net/th?id=OIP.mO_A2UPXwseLqDJYEiMNzQHaEK&pid=Api&P=0&h=220" style="height: 2rem;" alt=""></a>
            </div>
        </div>
        <div class="sec-nav">
            <div class="sec-nva-left">
                <img src="./images/nex.png" class="logo" alt="logo">
                <h1>QUIVER</h1>
            </div>
            <div class="nav-contact">
                <div class="address">
                    <div class="sec-icon">

                    </div>
                    <div class="sec-reach">
                        <h6>ADDRESS</h6>
                        <P>ABUJA</P>            
                    </div>
                </div> 
                <div class="calls">
                    <div class="sec-icon">

                    </div>
                    <div class="sec-reach">
                        <h6>CALL US</h6>
                        <P>+234-7048632016</P>            
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="third-nav">

        <div class="third-item">
            <ul class="the_bar_item">
                <a href="./index.php">Home</a>
                <?php foreach($nav_query_result as $nav): ?>
                <a href="./category.php?id=<?= $nav['id'] ?>"><?=$nav['title'] ?></a>
                <?php endforeach ?>
            </ul>
        </div>
        <button class="menu_btn main_bar">
            <i class="fas fa-bars"></i>
        </button>
        <button class="menu_btn cancel">
            <i class="fas fa-bars"></i>
        </button>
    </div>