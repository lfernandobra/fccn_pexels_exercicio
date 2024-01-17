// Home.js
import React, { useState } from 'react';
import getVideos from '../services/Api';
import VideoGrid from './VideoGrid';
import './Home.css';
import Select from 'react-select';

const Home = () => {
    const [searchQuery, setSearchQuery] = useState('');
    const [locale, setLocale] = useState('');
    const [size, setSize] = useState('');

    const locales = [
        { value: 'es-ES', label: 'Espanha' },
        { value: 'it-IT', label: 'Italia' },
        { value: 'ja-JP', label: 'Japão' },
    ];

    const sizes = [
        { value: '720p', label: '720p' },
        { value: '1080p', label: '1080p' },
        { value: '4k', label: '4k' },
    ];

    const [videos, setVideos] = useState([]);

    const handleSearch = () => {
        getVideos(searchQuery, locale, size)
            .then((response) => {
                setVideos(response.data.items);
            })
            .catch((error) => {
                console.error('Erro na API:', error);
            });
    };

    return (
        <div className="container"> {/* Atribua a classe aqui */}
            <div>
                <input
                    type="text"
                    value={searchQuery}
                    onChange={(e) => setSearchQuery(e.target.value)}
                />
                <br />
                <label>
                    Localidade:
                    <Select options={locales} value={locale} onChange={(selectedOption) => setLocale(selectedOption)} />
                </label>
                <br />
                <label>
                    Resolução:
                    <Select options={sizes} value={size} onChange={(selectedOption) => setSize(selectedOption)} />
                </label>
                <br />
                <button onClick={handleSearch}>Buscar</button>
            </div>
            <VideoGrid videos={videos} onClick={(video) => console.log('Clicou no vídeo:', video)} />
        </div>
    );
};

export default Home;
