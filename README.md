# User Posts API - Interview Task

Prosta aplikacja Symfony z API do zarządzania wpisami użytkowników.

## Zadanie

Jako developer musisz zaimplementować:

### 1. Encję Post
- Stwórz encję `Post` w `src/Entity/Post.php`
- Powinna zawierać pola: `id`, `title`, `content`, `author` (relacja do User), `createdAt`, `updatedAt`, `isPublished`
- Dodaj odpowiednie adnotacje Doctrine, Serializer i Validator
- Stwórz relację z encją `User` (jeden użytkownik może mieć wiele wpisów)

### 2. Repository dla Post
- Stwórz `PostRepository` w `src/Repository/PostRepository.php`
- Dodaj metody do wyszukiwania opublikowanych wpisów, wpisów po autorze, etc.

### 3. API Endpoints
Zaimplementuj w `src/Controller/PostController.php`:

- `GET /api/posts` - Lista wszystkich wpisów
- `GET /api/posts/{id}` - Pobranie konkretnego wpisu
- `POST /api/posts` - Tworzenie nowego wpisu (tylko dla zalogowanych użytkowników)

### 4. Testy w Codeception
- Uzupełnij testy w `tests/functional/PostCest.php`
- Dodaj testy dla wszystkich endpointów
- Testy powinny sprawdzać autoryzację i walidację

## Co jest już gotowe

- ✅ Encja `User` z pełną funkcjonalnością (rejestracja, logowanie, walidacja)
- ✅ `UserController` z endpointami do rejestracji i pobierania danych użytkownika
- ✅ `UserRepository` z metodami do zarządzania użytkownikami
- ✅ Testy dla User API w `tests/functional/UserCest.php`
- ✅ Konfiguracja Symfony z Doctrine, Security, JWT Authentication
- ✅ Konfiguracja bazy danych (PostgreSQL/SQLite)
- ✅ Podstawowa struktura testów Codeception

## Instalacja

1. Sklonuj projekt
2. Zainstaluj zależności:
```bash
composer install
```

3. Skopiuj plik konfiguracyjny:
```bash
cp env.example .env
```

4. Skonfiguruj bazę danych w `.env`:
```env
# PostgreSQL
DATABASE_URL="postgresql://username:password@localhost:5432/user_posts_api?serverVersion=15&charset=utf8"

# Lub SQLite
DATABASE_URL="sqlite:///%kernel.project_dir%/var/app.db"
```

5. Wygeneruj klucze JWT:
```bash
mkdir -p config/jwt
openssl genpkey -out config/jwt/private.pem -aes256 -algorithm rsa -pkeyopt rsa_keygen_bits:4096
openssl pkey -in config/jwt/private.pem -out config/jwt/public.pem -pubout
```

6. Utwórz bazę danych i uruchom migracje:
```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

7. Uruchom serwer deweloperski:
```bash
symfony server:start
```

## Struktura API

### Użytkownicy (gotowe)
- `POST /api/users` - Rejestracja użytkownika
- `GET /api/users/me` - Pobranie danych zalogowanego użytkownika

### Autoryzacja (gotowe)
- `POST /api/login_check` - Logowanie (zwraca JWT token)

### Wpisy (do zaimplementowania)
- `GET /api/posts` - Lista wpisów
- `GET /api/posts/{id}` - Szczegóły wpisu
- `POST /api/posts` - Tworzenie wpisu

## Testy

Uruchom testy:
```bash
# Wszystkie testy
vendor/bin/codecept run

# Tylko testy funkcjonalne
vendor/bin/codecept run functional

# Tylko testy akceptacyjne
vendor/bin/codecept run acceptance
```

## Wymagania

- PHP 8.1+
- Symfony 6.3+
- PostgreSQL lub SQLite
- Composer

## Bonus

Jako dodatkowe zadanie możesz:
- Dodać edycję i usuwanie tych wpisów