import React from 'react';
import VideoGridItem from './VideoGridItem';

const VideoGrid = ({ videos: items }) => {
    return (
        <div style={{ display: 'grid', gridTemplateColumns: 'repeat(4, 1fr)', gap: '16px' }}>
            {items.map((item) => (
                item.video_files.map((video) => {
                    if (item.width === video.width && item.height === video.height){
                        return <VideoGridItem key={video.id} video={video} image={item.video_pictures[0].picture}/>
                    }
                })
            ))}
        </div>
    );
};

export default VideoGrid;
