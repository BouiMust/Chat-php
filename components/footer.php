        <div style="height:80px;"></div>
        </div>
        <footer class='pt-2 border-top' style="color:#FFF;text-align:center;background:<?= $theme ?>">
            <p>MB Copyright © 2022</p>
        </footer>
        <!-- COMPTE UNE VUE -->
        <?php require_once('./functions/function_view.php') ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

        <!-- JAVASCRIPT -->
        <script>
            const days = {
                'Fri': 'Vendredi',
                'Sat': 'Samedi',
                'Sun': 'Dimanche',
                'Mon': 'Lundi',
                'Tue': 'Mardi',
                'Wed': 'Mercredi',
                'Thu': 'Jeudi'
            }

            const months = {
                'Jan': 'Janvier',
                'Feb': 'Février',
                'Mar': 'Mars',
                'Apr': 'Avril',
                'May': 'Mai',
                'Jun': 'Juin',
                'Jul': 'Juillet',
                'Aug': 'Août',
                'Sep': 'Septembre',
                'Oct': 'Octobre',
                'Nov': 'Novembre',
                'Dec': 'Décembre'
            }

            // MES ELEMENTS DU DOM
            const time = document.querySelector('.timeNow');
            const date = document.querySelector('.dateNow');

            // AFFICHE LA DATE
            let day = days[Date().slice(0, 3)];
            let month = months[Date().slice(4, 7)];
            let dayNumber = Date().slice(8, 10);
            let year = Date().slice(11, 15);
            date.innerHTML = day + ' ' + dayNumber + ' ' + month + ' ' + year;

            // AFFICHE L'HEURE
            time.innerHTML = Date().slice(16, 24);
            setInterval(() => {
                time.innerHTML = Date().slice(16, 24);
            }, 1000);
        </script>
        </body>

        </html>