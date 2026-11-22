<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Nuovo Disegno Pubblicato</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #fdf2f8; padding: 24px; color: #1e1b4b;">
    <div style="max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 12px; padding: 24px; border: 2px solid #f472b6;">
        <h2 style="color: #7e22ce; margin-top: 0;">🎨 Nuovo disegno pubblicato nell'Atelier!</h2>
        <p>È stato appena aggiunto un nuovo disegno nel blog:</p>
        <p><strong>Titolo:</strong> {{ $article->title }}</p>
        <p><strong>Tecnica:</strong> {{ $article->technique }}</p>
        <p><strong>Descrizione:</strong><br>{{ $article->description }}</p>
    </div>
</body>
</html>