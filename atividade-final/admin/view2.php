<?php
include_once('../config/conn.php');
include('session.php');
    


$stmt = $conectar->prepare("SELECT * FROM posts ORDER BY id DESC");

$stmt->execute();

$results = $stmt->fetchALL(PDO::FETCH_ASSOC);

include ('header.php');
?>

            
                <div class="container-fluid">
                    <h1 id="main-title">Meus Posts</h1>
                    <table class="table" id="contacts-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Título</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($results as $post): ?>
                                <tr>
                                    <td scope="row"><?= $post["id"] ?></td>
                                    <td scope="row"><?= $post["title"] ?></td>
                                    <td scope="row"><?= $post["description"] ?></td>
                                    <td class="actions">
                                        <a href="viewBlog.php?id=<?= $post["id"] ?>">
                                            <i class="fas fa-eye check-icon">Ver</i>
                                        </a>
                                        <a href="editar.php?id=<?= $post["id"] ?>">
                                            <i class="fas fa-eye check-icon">Editar</i>
                                        </a>
                                        <a href="delete.php?id=<?= $post["id"] ?>">X</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>
            </div>   
        </div>
    </main>

<?php
include("footer.php");
?>