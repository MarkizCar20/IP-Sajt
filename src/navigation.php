<div id="navbar-container">
    <nav>
        <ul>
            <li><a href="index.php">Naslovna</a></li>
            <!-- <li><a href="results.php">Izborni rezultati</a></li> -->
            <?php if(isset($_SESSION['user_role'])): ?>
                <?php if($_SESSION['user_role'] === 'Admin'): ?>
                    <li><a href="#">Kontrolori</a>
                        <ul>
                            <li><a href="adjust_controler.php">Unesi kontrolora</a></li>
                            <li><a href="controler_list.php">Spisak kontrolora</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Izborne celine</a>
                        <ul>
                            <li><a href="#">Opstine</a>
                                <ul>
                                    <li><a href="add_municipality.php">Unesi opstinu</a></li>
                                    <li><a href="list_municipality.php">Spisak opstina</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Izborna mesta</a>
                                <ul>
                                    <li><a href="add_voting_place.php">Unesi izborno mesto</a></li>
                                    <li><a href="list_voting_place.php">Spisak izbornih mesta</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="news.php">Vesti</a>
                        <ul>
                            <li><a href="news_input.php">Unesi vest</a></li>
                            <li><a href="news.php">Azuriraj vesti</a></li>
                        </ul>
                    </li>
                <?php elseif($_SESSION['user_role'] === 'Control'): ?>
                    <li><a href="results.php">Izborni rezultati</a>
                        <ul>
                            <li><a href="results_input.php">Unesi rezultate</a></li>
                            <li><a href="adjust_results.php">Azuriraj rezultate</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                <li><?php echo isset($logout_link) ? $logout_link : ''; ?></li>
            <?php else: ?>
                <li><a href="news.php">Vesti</a></li>
                <li><?php echo isset($login_link) ? $login_link : ''; ?></li>
            <?php endif; ?>
        </ul>
    </nav>
</div>