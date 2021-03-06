<!DOCTYPE html>
<html lang="<?php echo $data['locale']['lang'];?>">
<head>
    <meta charset="<?php echo $data['locale']['charset'];?>" />
    <title><?php echo $data['title'];?></title>
    <meta name='generator' content='Xoops Engine' />
    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon" />
    <link rel="icon" href="../..favicon.ico" type="image/ico" />
    <link rel="stylesheet" href="./resources/scripts/style.css" />
    <script type="text/javascript" src="./resources/scripts/jquery.min.js"></script>
    <?php
        if (!empty($data['headContent'])) {
            echo $data['headContent'];
        }
    ?>
</head>
<body class="container_12">
    <!-- header -->
    <div id="header">
        <div class="grid_3">
            <div class="logo"></div>
            <h1 class="logo-text"><a href="<?php echo $data['baseUrl'];?>"><?php echo $data['title']?></a></h1>
        </div>
        <?php
            $countPages = count($data['navPages']);
            $no = 0;
            foreach ($data['navPages'] as $key => $pageData) {
                $no++;
                $classWidth = ($no < $countPages) ? 'grid_2' : 'grid_3';
                echo '<div class="' . $classWidth . '">';
                if ($no > $data['pageIndex'] + 1) {
                    echo '<span class="nav">' . $no . ' ' . $pageData['title'] . '</span>';
                } else {
                    $classCurrent = ($no == $data['pageIndex'] + 1) ? ' current' : '';
                    echo '<span class="nav' . $classCurrent . '"><a href="' . $pageData['url'] . '">' . $no . ' ' . $pageData['title'] . '</a></span>';
                }
                echo '</div>';
            }
        ?>
    </div>

    <!-- content -->
    <?php
        if (!empty($data['pageHasForm'])) {
            echo '<form action="' . $_SERVER['PHP_SELF'] . '" method="post">';
        }
    ?>
    <div id="content">
        <h1 class="slogan"><?php echo $data['desc']?></h1>
        <?php
            echo $data['content'];
        ?>
    </div>

    <div id="buttons">
        <?php if (!empty($data['previousUrl'])) { ?>
            <button type="button" accesskey="p" onclick="location.href='<?php echo $data['previousUrl']; ?>'">
            <?php echo _INSTALL_BUTTON_PREVIOUS; ?>
            </button>
        <?php } ?>

        <button type="button" accesskey="r" onclick="location.href='<?php echo $data['currentPage']['url']; ?>'">
        <?php echo _INSTALL_BUTTON_RELOAD; ?>
        </button>

        <?php
        if ($status > -1) {
            if (!empty($data['pageHasForm'])) {
        ?>

            <button type="submit">
        <?php echo _INSTALL_BUTTON_NEXT; ?>
            </button>
        <?php
            } elseif (!empty($data['nextUrl'])) { ?>
            <button type="button" accesskey="n" onclick="location.href='<?php echo $data['nextUrl']; ?>'">
        <?php echo _INSTALL_BUTTON_NEXT; ?>
            </button>
        <?php
            }
        }
        ?>
    </div>

    <?php
        if (!empty($data['pageHasForm'])) {
            echo '<input type="hidden" name="page" value="' . $data['currentPage']['key'] . '">';
            echo '</form>';
        }
    ?>

    <div id="footer">
        <p>Powered by <a href="http://www.xoopsengine.org" title="Xoops Engine">Xoops Engine</a></p>
    </div>
    <?php
        if (!empty($data['footContent'])) {
            echo $data['footContent'];
        }
    ?>
</body>
</html>