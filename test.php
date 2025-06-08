ImCoder, [08.06.2025 8:03]
<?php
$site_title = "Сердца вместе";
$admin_tg = "your_telegram_username";
$posts = [
    [
        'title' => 'Как найти свою вторую половинку',
        'date' => '15 мая 2024',
        'content' => 'В современном мире знакомства перешли в цифровую эпоху. Но как найти того самого человека среди миллионов профилей? Секрет в том, чтобы оставаться собой и четко понимать, что вы ищете.',
        'image' => 'https://images.unsplash.com/photo-1516589178581-6cd7833ae3b2?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
    ],
    [
        'title' => 'Первое свидание: правила успеха',
        'date' => '22 апреля 2024',
        'content' => 'Первое свидание - это как собеседование, но с более приятными последствиями. Главное - быть естественным, слушать и задавать правильные вопросы. И помните: если есть химия, вы это почувствуете.',
        'image' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
    ],
    [
        'title' => 'Знакомства после 30: новые правила',
        'date' => '10 марта 2024',
        'content' => 'После 30 лет подход к знакомствам меняется. Люди знают себя лучше, понимают, чего хотят от отношений. Это делает знакомства более осмысленными, но и более сложными. Как найти баланс?',
        'image' => 'https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
    ]
];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $site_title; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        :root {
            --primary-color: #ff6b6b;
            --secondary-color: #ff8e8e;
            --dark-color: #333;
            --light-color: #f8f9fa;
            --accent-color: #4ecdc4;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            line-height: 1.6;
            color: var(--dark-color);
            background-color: #fff;
            overflow-x: hidden;
        }
        
        h1, h2, h3, h4 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--dark-color);
        }
        
        a {
            text-decoration: none;
            color: var(--primary-color);
            transition: all 0.3s ease;
        }
        
        a:hover {
            color: var(--secondary-color);
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Header */
        header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2rem 0;
            text-align: center;
            position: relative;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        header h1 {
            font-size: 3rem;
            margin-bottom: 0.5rem;
            color: white;
        }
        
        header p {
            font-size: 1.2rem;
            opacity: 0.9;
        }
        
        /* Navigation */
        nav {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        nav ul {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 1rem 0;
        }
        
        nav ul li {
            margin: 0 1.5rem;
        }
        
        nav ul li a {
            font-weight: 600;
            color: var(--dark-color);
            padding: 0.5rem 0;
            position: relative;
        }
        
        nav ul li a:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: var(--primary-color);
            bottom: 0;
            left: 0;
            transition: width 0.3s ease;
        }
        
        nav ul li a:hover:after {
            width: 100%;
        }
        
        /* Main content */
        .main {
            padding: 3rem 0;
        }
        
        .posts {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }
        
        .post {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .post:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        
        .post-image {
            height: 200px;
            overflow: hidden;
        }
        
        .post-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .post:hover .post-image img {
            transform: scale(1.05);
        }
        
        .post-content {
            padding: 1.5rem;
        }
        
        .post-content h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }
        
        .post-meta {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }
        
        .post-meta i {
            margin-right: 0.5rem;
            color: var(--primary-color);
        }
        
        /* Footer */
        footer {
            background-color: var(--dark-color);
            color: white;
            text-align: center;
            padding: 2rem 0;
            margin-top: 3rem;
        }
        
        footer p {
            margin-bottom: 1rem;
        }
        
        .social-links {
            display: flex;
            justify-content: center;
            margin-bottom: 1rem;
        }
        
        .social-links a {
            color: white;
            margin: 0 0.5rem;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }
        
        .social-links a:hover {
            color: var(--accent-color);
        }
        
        .tg-button {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background-color: #0088cc;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            z-index: 99;
            animation: pulse 2s infinite;
        }
        
        .tg-button:hover {
            transform: scale(1.1);
            background-color: #0077b5;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
            animation: none;
        }
        
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(0, 136, 204, 0.7);
            }
            70% {
                box-shadow: 0 0 0 15px rgba(0, 136, 204, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(0, 136, 204, 0);
            }
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            header h1 {
                font-size: 2.2rem;
            }
            
            nav ul {
                flex-direction: column;
                align-items: center;
            }
            
            nav ul li {
                margin: 0.5rem 0;
            }
            
            .posts {
                grid-template-columns: 1fr;
            }
            
            .tg-button {
                width: 50px;
                height: 50px;
                font-size: 25px;
                bottom: 20px;
                right: 20px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1><?php echo $site_title; ?></h1>
            <p>Искренние истории о любви, встречах и отношениях</p>
        </div>
    </header>
    
    <nav>
        <ul>
            <li><a href="#">Главная</a></li>
            <li><a href="#">Истории</a></li>
            <li><a href="#">Советы</a></li>
            <li><a href="#">О проекте</a></li>
            <li><a href="#">Контакты</a></li>
        </ul>
    </nav>
    
    <main class="main container">
        <section>
            <h2>Последние записи</h2>
            <div class="posts">
                <?php foreach ($posts as $post): ?>
                <article class="post">
                    <div class="post-image">
                        <img src="<?php echo $post['image']; ?>" alt="<?php echo $post['title']; ?>">
                    </div>
                    <div class="post-content">
                        <h3><?php echo $post['title']; ?></h3>
                        <div class="post-meta">
                            <i class="far fa-calendar-alt"></i>
                            <span><?php echo $post['date']; ?></span>
                        </div>
                        <p><?php echo $post['content']; ?></p>
                        <a href="#">Читать далее...</a>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
    
    <footer>
        <div class="container">
            <div class="social-links">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-vk"></i></a>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
            <p>&copy; <?php echo date('Y'); ?> <?php echo $site_title; ?>. Все права защищены.</p>
            <p>Сайт о любви, знакомствах и отношениях</p>
        </div>
    </footer>
    
    <a href="https://t.me/<?php echo $admin_tg; ?>" class="tg-button" target="_blank">
        <i class="fab fa-telegram-plane"></i>
    </a>
</body>
</html>