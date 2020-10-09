<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Les Argonautes</title>
    <link rel="stylesheet" href="index.css" />
</head>

<body>
    <!-- Header section -->
    <header>
        <h1>
            <img src="https://www.wildcodeschool.com/assets/logo_main-e4f3f744c8e717f1b7df3858dce55a86c63d4766d5d9a7f454250145f097c2fe.png"
                alt="Wild Code School logo" />
            Les Argonautes
        </h1>
    </header>
    <!-- Main section -->
    <main>
        <!-- New member form -->
        <h2>Ajouter un(e) Argonaute</h2>
        <form class="new-member-form" action="index.php" method="POST">
            <label for="name">Nom de l&apos;Argonaute</label>
            <input id="name" name="newMember" type="text" placeholder="Nouvel argonaute" />
            <button type="submit" name="ok">Envoyer</button>
        </form>
        <?php
        if(isset($_POST["ok"]))
            {
                $newMember = $_POST["newMember"];
                $id = mysqli_connect("localhost","root","","challengewcs");
                $req = "insert into membres (nom) values ('$newMember')";
                $res = mysqli_query($id,$req);
                echo mysqli_error($id);
            }
        ?>

        <!-- Member list -->
        <h2>Membres de l'équipage</h2>
        <section class="member-list">
            <div class="member-item">
                <?php
                $id = mysqli_connect("localhost","root","","challengewcs");
                $req = 'SELECT * FROM `membres`';
                $result = mysqli_query($id,$req);
                echo mysqli_error($id);
            foreach($result as $membres){
        ?>
                <div style="overflow-x:auto;">

                    <table>
                        <tbody>
                            <tr>
                                <th> ID </th>
                                <td>
                                    <?= $membres['id'] ?>
                                </td>
                                <th> NOM </th>
                                <td>
                                    <?= $membres['nom'] ?>
                                </td>
                            </tr>
                            <?php
            }
            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>Réalisé par Jason en Anthestérion de l'an 515 avant JC</p>
    </footer>
</body>

</html>