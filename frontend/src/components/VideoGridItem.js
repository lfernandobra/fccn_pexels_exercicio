import React from 'react';
import { Link } from 'react-router-dom';

const VideoGridItem = ({ video, image}) => {
    return (
        <div>
            <Link to={`${video.link}`}>
                <img src={image} />
            </Link>
        </div>
    );
};

export default VideoGridItem;
