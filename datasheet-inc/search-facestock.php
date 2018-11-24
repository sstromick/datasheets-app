            <div id="search-form">
                <form action="http://www.technicote.com/datasheet-results.php" method="post">
                    <label for="facestock">Facestock:</label>
                    <select id="facestockDD" name="facestock">
                        <option value=""></option>
                        <?php
                        foreach ($facestock as $value) {
                                echo '<option value="' . $value[id] . '">' . $value[txt] . '</option>';
                        }
                        ?>
                    </select>
                    
                    <input type="submit" name="search-non-press" value="Search">
                </form>
            </div>
