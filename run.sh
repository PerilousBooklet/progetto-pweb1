#!/bin/bash
#!/usr/bin/bash
tmux new -s phpwebserver -d
tmux send-keys -t phpwebserver 'php -S localhost:2345 -t ./src/' C-m
tmux attach -t phpwebserver

