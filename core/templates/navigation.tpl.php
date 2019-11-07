<?php if(isset($data) && !empty($data)): ?>
    <nav>
        <div class="wrapper"> 
            <?php if(isset($data['image'])): ?>
                <a href="/"><img src="<?php print $data['image']; ?>" alt="logo"></a>
            <?php endif; ?>
            <?php if(isset($data['links'])): ?>
                <ul>
                    <?php foreach ($data['links'] as $link): ?>
                        <li><a href="<?php print $link['url']; ?>"><?php print $link['title']; ?></a></li>
                    <?php endforeach;?>
                </ul>
            <?php endif; ?>
        </div>
    </nav>
<?php endif; ?>