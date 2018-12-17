<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter;
class drive extends Controller
{
    protected $client;
    protected $folder_id;
    protected $service;
    protected $ClientId     = '1089212488132-qes2ovkpmbdflvd6au31df490gv0bfu3.apps.googleusercontent.com';
    protected $ClientSecret = '_dB8rKyM75_tb3sZpgdDcX06';
    protected $refreshToken = '1/mlyReDX9gGpJWH-7DDYGZwUIde7RffWb55bCxxR-Km8';

    public function __construct()
    {
        $this->client = new \Google_Client();
        $this->client->setClientId($this->ClientId);
        $this->client->setClientSecret($this->ClientSecret);
        $this->client->refreshToken($this->refreshToken);
        $this->service = new \Google_Service_Drive($this->client);
        Cache::rememberForever('folder_id', function () {
            return $this->create_folder();
        });
        $this->folder_id = Cache::get('folder_id');
    }

    protected function create_folder()
    {
        $fileMetadata = new \Google_Service_Drive_DriveFile([
            'name'     => 'google_drive_folder_name',
            'mimeType' => 'application/vnd.google-apps.folder',
        ]);
        $folder = $this->service->files->create($fileMetadata, ['fields' => 'id']);
        return $folder->id;
    }

    protected function remove_duplicated($file)
    {
        $response = $this->service->files->listFiles([
            'q' => "'$this->folder_id' in parents and name contains '$file' and trashed=false",
        ]);
        foreach ($response->files as $found) {
            return $this->service->files->delete($found->id);
        }
    }

    public function upload_files()
    {
        $adapter    = new GoogleDriveAdapter($this->service, Cache::get('folder_id'));
        $filesystem = new Filesystem($adapter);
        // here we are uploading files from local storage
        // we first get all the files
        $files = Storage::files();
        // loop over the found files
        foreach ($files as $file) {
            // remove file from google drive in case we have something under the same name
            // comment out if its okay to have files under the same name
            $this->remove_duplicated($file);
            // read the file content
            $read = Storage::get($file);
            // save to google drive
            $filesystem->write($file, $read);
            // remove the local file
            Storage::delete($file);
        }
    }
    /**
     * in case u want to get the total file count
     * inside a specific folder.
     *
     * @return [type] [description]
     */
    public function files_count()
    {
        $response = $this->service->files->listFiles();
        return $response->files;
    }
}
