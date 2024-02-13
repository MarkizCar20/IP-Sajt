<div id="navbar-container">
    <nav>
        <ul>
            <li><a href="index.html">Naslovna</a></li>
            <li><a href="#">Izborni rezultati</a></li>
            <?php if(isset($_SESSION['user_role'])): ?>
                <?php if($_SESSION['user_role'] === 'Admin'): ?>
                    <li><a href="#">Kontrolori</a>
                        <ul>
                            <li><a href="controler_input.html">Unesi kontrolora</a></li>
                            <li><a href="controler_list.html">Spisak kontrolora</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Izborne celine</a>
                        <ul>
                            <li><a href="#">Opstine</a>
                                <ul>
                                    <li><a href="add_municipality.html">Unesi opstinu</a></li>
                                    <li><a href="list_municipality.html">Spisak opstina</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Izborna mesta</a>
                                <ul>
                                    <li><a href="add_voting_place.html">Unesi izborno mesto</a></li>
                                    <li><a href="list_voting_place.html">Spisak izbornih mesta</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">Vesti</a>
                        <ul>
                            <li><a href="news_input.html">Unesi vest</a></li>
                            <li><a href="news.html">Azuriraj vesti</a></li>
                        </ul>
                    </li>
                <?php elseif($_SESSION['user_role'] === 'Control'): ?>
                    <li><a href="#">Kontrolori</a></li>
                <?php endif; ?>
                <li><?php echo isset($logout_link) ? $logout_link : ''; ?></li>
            <?php else: ?>
                <li><a href="#">Vesti</a></li>
                <li><?php echo isset($login_link) ? $login_link : ''; ?></li>
            <?php endif; ?>
        </ul>
    </nav>
</div>
