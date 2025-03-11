# Typesense Search for Korean

예전에 한글 지원이 안되었던 것으로 알았는데, 다시 laravel news에 올라와서 테스트 해봄

https://hub.docker.com/r/typesense/typesense
```bash
export TYPESENSE_API_KEY=xyz

mkdir $(pwd)/typesense-data

docker run -p 8108:8108 -v$(pwd)/typesense-data:/data typesense/typesense:28.0 \
  --data-dir /data --api-key=$TYPESENSE_API_KEY --enable-cors
```

```php
App\Models\Post::search('내과')->get();
App\Models\Post::search('간ㄷ')->get();
App\Models\Post::search('호텔')->get();
```

## 결과
- 중간 검색 안됨
- 자음 검색 안됨
