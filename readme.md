# Typesense Search for Korean


https://hub.docker.com/r/typesense/typesense
```bash
export TYPESENSE_API_KEY=xyz

mkdir $(pwd)/typesense-data

docker run -p 8108:8108 -v$(pwd)/typesense-data:/data typesense/typesense:28.0 \
  --data-dir /data --api-key=$TYPESENSE_API_KEY --enable-cors
```

App\Models\Post::search('내과')->get();
App\Models\Post::search('간ㄷ')->get();
App\Models\Post::search('호텔')->get();

## 결과
- 중간 검색 안됨
- 