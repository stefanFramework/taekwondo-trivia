function install() {
    if ! file_exists "docker-compose.yml"
    then
        # Need to create docker-compose.yml
        echo "Creating docker-compose.yml"
        cp docker-compose.yml.example docker-compose.yml
    fi

    if ! file_exists "src/.env"
    then
        # Need to create src/.env
        echo "Creating src/.env"
        cp src/.env.example src/.env
    fi

    docker-compose up -d
    artisan key:generate
}

function file_exists() {
    FILE=$1; shift
    if [ -f "$FILE" ];
    then
        # File does exist
        return 0
    fi

    return 1
}

function artisan() {
    docker exec tkd_trivia_web php artisan $@
}

function logs() {
    docker exec tkd_trivia_web sh -c "tail -f /var/www/storage/logs/laravel-$(date +"%Y-%m-%d").log"
}

function composer() {
    docker exec tkd_trivia_web composer $@
}

COMMAND=$1; shift
case $COMMAND in
    install)
        install
    ;;
    artisan)
        artisan $@
    ;;
    logs)
        logs
    ;;
    composer)
        composer $@
    ;;
    *)
        echo "Invalid command $COMMAND";
        exit 1
    ;;
esac